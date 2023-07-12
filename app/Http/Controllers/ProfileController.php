<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.index',['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'profile_image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=100,height=100',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;

        if($request->hasFile('profile_image')) { 
            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('assets/img'), $imageName);
            $user->profile_image = 'assets/img/'.$imageName;
        }

        $user->save();

        return back()->with('success','Profile has been updated successfully');
    }
}

