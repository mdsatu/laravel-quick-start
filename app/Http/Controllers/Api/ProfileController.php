<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Profile Info
    public function profile(){
        return response()->json(Auth::guard('back_api')->user());
    }

    // Update Profile
    public function update(Request $request)
    {
        $q = Auth::user('back_api');

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

        if ($request->file('image')) {
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
            if ($q->image) {
                $img = public_path() . '/uploads/admin/' . $q->image;
                if (file_exists($img)) {
                    unlink($img);
                }
            }
            $q->image = $photo;
        }

        $q->save();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Profile updated successfully.',
            'data' => $q
        ]);
    }
}
