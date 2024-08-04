<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->get();
        return view('content.profile.showprofile' , ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('content.profile.updateprofile' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:5',
            'country' => 'required',
            'address' => 'required'
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->update([
            'name' => $request->name,
            'country' => $request->country,
            'address' => $request->address
        ]);
        $image = null;
        if($request->hasFile('img')){
            $image = time(). '.' . $request->img->extension();
            $request->img->move(public_path('images'), $image);
            $user->img = $image;
        }  
        $user->save();
        return to_route('profile.index')->with('msg' , 'your profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
