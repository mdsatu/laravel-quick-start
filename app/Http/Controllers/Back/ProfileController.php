<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Admin Profile
    public function index(Request $request){
        return view('back.profile.index')->with([
            'ref' => $request->ref ?? 'info'
        ]);
    }

    // Update Profile
    public function profileSubmit(Request $request){
        $q = Auth::user('admin');

        if($request->action == 'information'){
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|max:255|unique:admins,email,' . $q->id,
                'mobile_number' => 'required|max:255|unique:admins,mobile_number,' . $q->id
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

                // Delete old
                if($q->image){
                    $img = public_path() . '/uploads/admin/' . $q->image;
                    if (file_exists($img)) {
                        unlink($img);
                    }
                }
                $q->image = $photo;
            }

            $route = route('back.profile') . '?ref=info';
        }else{
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed'
            ]);

            if(!Hash::check($request->old_password, $q->password)){
                return redirect()->back()->with('error', 'Old password does not  match!');
            }

            $q->password = Hash::make($request->password);
            $route = route('back.profile') . '?ref=password';
        }

        if($q->save()){
            return redirect($route)->with('success', 'Profile updated successfully.');
        }
        return redirect($route)->with('error', 'Something wrong!');
    }
}
