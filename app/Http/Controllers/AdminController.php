<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //admin profile code here
    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // admin profile edit code
    public function editprofile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }//end method

    public function storeprofile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['profile_image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    } //end method


    public function changePassword(){
        return view('admin.admin_change_password');
    } //end method

    public function updatePassword(Request $request){

        $validated = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message', 'Password Update Successfully');
            return redirect()->back();
        }else {
             session()->flash('message', 'Old Password is not match');
            return redirect()->back();
        }

    }//end method


}
