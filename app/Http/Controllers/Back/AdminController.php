<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Role;
use App\AdminRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\SuperAdminAccess;

class AdminController extends Controller
{
    public function __construct(){
        // Check Role
        $this->middleware(SuperAdminAccess::class);
    }

    // Admin list
    public function index(){
        $q = Admin::with('Roles')->latest()->get();

        return view('back.admin.index', compact('q'));
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'title' => 'required|max:255',
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

            return redirect()->route('back.admins.index')->with('success', 'Admin created successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    // Edit Admin
    public function edit(Admin $admin){
        $roles = Role::get();
        return view('back.admin.edit')->with([
            'data' => $admin,
            'roles' => $roles
        ]);
    }

    public function show(Admin $admin){
        return view('back.admin.show')->with([
            'data' => $admin
        ]);
    }

    // Update
    public function update(Request $request, Admin $admin){
        if($request->type == 'info'){
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'title' => 'required|max:191',
                'mobile_number' => 'required|unique:admins,mobile_number,' . $admin->id,
                'email' => 'required|unique:admins,email,' . $admin->id,
                'role' => 'required',
                'address' => 'max:255',
            ]);

            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->mobile_number = $request->mobile_number;
            $admin->email = $request->email;
            $admin->address = $request->address;
            $admin->bio = $request->bio;

            // Update Role
            DB::table('admin_roles')->where('admin_id', $admin->id)->delete();
            foreach($request->role as $role){
                $aRole = new AdminRole();
                $aRole->role_id = $role;
                $aRole->admin_id = $admin->id;
                $aRole->save();
            }
        }else{
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
            $admin->password = Hash::make($request->password);
        }

        if($admin->save()){
            return redirect()->back()->with('success', 'Admin updated successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    // Delete
    public function destroy(Admin $admin){
        if($admin->id == auth('back')->user()->id){
            return redirect()->back()->with('error', 'Sorry! You can not delete your own account!');
        }

        // Delete Image
        if($admin->image){
            $img = public_path() . '/uploads/admin/' . $admin->image;
            if (file_exists($img)) {
                unlink($img);
            }
        }

        if($admin->delete()){
            return redirect()->back()->with('success', 'Admin deleted successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }
}
