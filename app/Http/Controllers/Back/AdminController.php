<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Role;
use App\AdminRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin list
    public function index(){
        $q = Admin::with('Role')->latest()->get();

        return view('back.admin.admins')->with([
            'q' => $q
        ]);
    }

    // Create Admin
    public function create(){
        $roles = Role::get();

        return view('back.admin.create')->with([
            'roles' => $roles
        ]);
    }

    // Store Admin
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'mobile_number' => 'required|unique:admins',
            'email' => 'required|unique:admins',
            'role' => 'required',
            'address' => 'max:255',
            'password' => 'required|min:8|confirmed'
        ]);
        $request['password'] = Hash::make($request->password);

        if($query = Admin::create($request->all())){
            // Make Role
            foreach($request->role as $role){
                $aRole = new AdminRole();
                $aRole->role_id = $role;
                $aRole->admin_id = $query->id;
                $aRole->save();
            }

            return redirect()->route('admin.Admins')->with('success', 'Admin created successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    // Edit Admin
    public function edit(Admin $q){
        $roles = Role::get();
        return view('back.admin.edit')->with([
            'data' => $q,
            'roles' => $roles
        ]);
    }

    // Update
    public function update(Request $request, Admin $q){
        if($request->type == 'info'){
            $request->validate([
                'name' => 'required|max:191',
                'mobile_number' => 'required|unique:admins,mobile_number,' . $q->id,
                'email' => 'required|unique:admins,email,' . $q->id,
                'role' => 'required',
                'address' => 'max:255',
            ]);

            $q->name = $request->name;
            $q->mobile_number = $request->mobile_number;
            $q->email = $request->email;
            $q->address = $request->address;
            $q->bio = $request->bio;

            // Update Role
            DB::table('admin_roles')->where('admin_id', $q->id)->delete();
            foreach($request->role as $role){
                $aRole = new AdminRole();
                $aRole->role_id = $role;
                $aRole->admin_id = $q->id;
                $aRole->save();
            }
        }else{
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
            $q->password = Hash::make($request->password);
        }

        if($q->save()){
            return redirect()->back()->with('success', 'Admin updated successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    // Delete
    public function destroy(Admin $q){
        if($q->id == auth('admin')->user()->id){
            return redirect()->back()->with('error', 'Sorry! You can not delete your own account!');
        }

        // Delete Image
        if($q->image){
            $img = public_path() . '/uploads/admin/' . $q->image;
            if (file_exists($img)) {
                unlink($img);
            }
        }

        if($q->delete()){
            return redirect()->back()->with('success', 'Admin deleted successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }
}
