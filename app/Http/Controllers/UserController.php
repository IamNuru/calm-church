<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'required|string|email',
            'role' => 'nullable|string|max:20',
            'biography' => 'nullable|string|min:2|max:500',
            'position' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::whereId($id)->first();

        if (!$user) {
            # code...
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->biography = $request->biography;
            $user->position = $request->position;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            /* $user->profile_photo_path = $request->profile_photo_path; */
            $user->save();

            return redirect()->back()->with('success', 'User Updated');

        }
        
    }


    public function destroy($id){
        $user = User::whereId($id)->first();
        $user->destroy();

        return redirect()->back()->with('success', 'User Deleted');
    }

    public function changeUserStatus($id){
        $user = User::whereId($id)->first();
        $user->status = !$user->status;
        $user->update();

        return redirect()->back()->with('success', 'User status updated');
    }
}
