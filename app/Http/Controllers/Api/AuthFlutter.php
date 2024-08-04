<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Book;

class AuthFlutter extends Controller
{

    // register user using name and email and password confirm via Api 
    public function register(Request $request)
    {
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
        return response()->json(['message', 'user has been register successfuly']);

    }


    // login user using email and password with validate via Api
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2|string',
        ]);
        //check
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->hasRole('admin')) {
                return response()->json(Auth::user());
            }
            return response()->json(Auth::user());
            // return response()->json(["message" , "wellcome user"]);
        }
        return response()->json(['wrong', 'Email Or Passowrd does not exists']);
    }


    // method to logout user 
    public function logout()
    {
        Auth::logout();
        return response()->json(['message', 'user has been logout']);
    }

    public function AllBook()
    {
        $books = Book::all();
        return $books->toJson();
    }

    public function AllCat()
    {
        $cats = Categorie::all();
        return $cats->toJson();
    }

    public function showImg(String $url)
    {
        // return view("content.showimg" , compact("url"));
        return response()->file("images/$url");
    }

  
}
