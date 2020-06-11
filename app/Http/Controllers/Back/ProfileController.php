<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Admin Profile
    public function profile(){
        return view('back.profile.profile');
    }

    // Update Profile
    public function profileSubmit(Request $request){
        $q = Admin::find(auth('admin')->user()->id);

        if($request->action == 'information'){
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255|unique:admins,email,' . auth('admin')->user()->id,
                'mobile_number' => 'required|max:255|unique:admins,mobile_number,' . auth('admin')->user()->id
            ]);

            $q->first_name = $request->first_name;
            $q->last_name = $request->last_name;
            $q->email = $request->email;
            $q->mobile_number = $request->mobile_number;
            $q->address = $request->address;
            $q->bio = $request->bio;

            if($request->file('image')){
                $this->validate($request, [
                    'image' => 'image|mimes:jpg,png,jpeg,gif'
                ]);

                $file = $request->file('image');
                $photo = time() . '.' . $file->getClientOriginalExtension();
                // Resize Image 120*120
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(120, 120);
                $image_resize->save(public_path('/uploads/admin/' . $photo));

                // Delete Old
                if($q->image){
                    $img = public_path() . '/uploads/admin/' . $q->image;
                    if (file_exists($img)) {
                        unlink($img);
                    }
                }
                $q->image = $photo;
            }
        }else{
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);

            $q->password = Hash::make($request->password);
        }

        if($q->save()){
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }
}
