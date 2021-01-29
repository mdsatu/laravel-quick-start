<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    // Website Settings
    public function info(){
        return view('back.settings.info');
    }

    // Update Settings
    public function infoSubmit(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'short_title' => 'required|max:255',
            'slogan' => 'required|max:255',
            'web_url' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile' => 'required|max:255',
            'address' => 'required|max:255',
            'copyright' => 'required|max:255',
        ]);

        $where = array();
        $where['group'] = 'general';

        // Website Title
        $where['name'] = 'title';
        $insert['value'] = $request->title;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Website Short Title
        $where['name'] = 'short_title';
        $insert['value'] = $request->short_title;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Slogan
        $where['name'] = 'slogan';
        $insert['value'] = $request->slogan;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Slogan
        $where['name'] = 'web_url';
        $insert['value'] = $request->web_url;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Email
        $where['name'] = 'email';
        $insert['value'] = $request->email;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Mobile
        $where['name'] = 'mobile';
        $insert['value'] = $request->mobile;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Mobile
        $where['name'] = 'address';
        $insert['value'] = $request->address;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Copyright
        $where['name'] = 'copyright';
        $insert['value'] = $request->copyright;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Colors & Codes
        $where['name'] = 'primary_color';
        $insert['value'] = $request->primary_color;
        DB::table('settings')->updateOrInsert($where, $insert);
        $where['name'] = 'secondary_color';
        $insert['value'] = $request->secondary_color;
        DB::table('settings')->updateOrInsert($where, $insert);
        $where['name'] = 'background_color';
        $insert['value'] = $request->background_color;
        DB::table('settings')->updateOrInsert($where, $insert);
        $where['name'] = 'custom_head_code';
        $insert['value'] = $request->custom_head_code;
        DB::table('settings')->updateOrInsert($where, $insert);
        $where['name'] = 'custom_body_code';
        $insert['value'] = $request->custom_body_code;
        DB::table('settings')->updateOrInsert($where, $insert);
        $where['name'] = 'custom_footer_code';
        $insert['value'] = $request->custom_footer_code;
        DB::table('settings')->updateOrInsert($where, $insert);

        // Update Logo
        if($request->logo){
            $this->validate($request, [
                'logo' => 'image|mimes:jpg,png,jpeg,gif'
            ]);

            // Delete Old
            if(\Info::Web('general', 'logo')){
                $img_del = public_path('/uploads/info/' . \Info::Web('general', 'logo'));
                if (file_exists($img_del)) {
                    unset($photo);
                    unlink($img_del);
                }
            }

            $file = $request->file('logo');
            $photo = 'logo.' . $file->getClientOriginalExtension();
            $destination = public_path() . '/uploads/info';
            $file->move($destination, $photo);

            // Store logo
            $where['name'] = 'logo';
            $insert['value'] = $photo;
            DB::table('settings')->updateOrInsert($where, $insert);
        }

        // Update Favicon
        if($request->favicon){
            $this->validate($request, [
                'favicon' => 'image|mimes:jpg,png,jpeg,gif'
            ]);

            // Delete Old
            if(\Info::Web('general', 'favicon')){
                $img_del = public_path('/uploads/info/' . \Info::Web('general', 'favicon'));
                if (file_exists($img_del)) {
                    unset($photo);
                    unlink($img_del);
                }
            }

            $file = $request->file('favicon');
            $photo = 'favicon.' . $file->getClientOriginalExtension();
            $destination = public_path() . '/uploads/info';
            $file->move($destination, $photo);

            // Store Favicon
            $where['name'] = 'favicon';
            $insert['value'] = $photo;
            DB::table('settings')->updateOrInsert($where, $insert);
        }

        return redirect()->back()->with('success', 'Information updated successfully.');
    }
}
