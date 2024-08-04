<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|bail|unique:users',
            'country' => 'required|max:40',
            'address' => 'required|max:80',
            'password' => 'required|min:3|max:15|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'create_date' => carbon::now()
        ]);
        $user->save();
        Auth::login($user);
        $user->assignRole('user');
        $users = User::all();
        return redirect('/book');

    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2|string',
        ]);
        //check
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->hasRole('admin')) {
                return to_route('dashboard');
            }
            return to_route("book.index");
        }
        return back()->withErrors([
            'wrong' => 'error , email or password does not exists'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        Gate::authorize("view", Auth::user());
        $books = Book::all();
        $users = User::all();
        return view('content.dashboard', [
            "data" => $books,
            'users' => $users,
        ]);

    }
    public function setting()
    {
        $user = User::where(["id" => Auth::user()->id])->get();
        return view('content.profile.updateprofile', ['user' => $user]);
    }


    public function search(Request $request)
    {
        if ($request->search) {
            $data = $request->search;
            return view("content.books.showsearch", compact("data"));
        } else {
            return to_route("book.index");
        }
    }

    public function sendpasswordlink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);


    }

    public function restpassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
