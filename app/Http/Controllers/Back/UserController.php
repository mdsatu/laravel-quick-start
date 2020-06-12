<?php

namespace App\Http\Controllers\Back;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = User::latest()->get();
        return view('back.user.index')->with([
            'q' => $q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'max:255|unique:users',
            'mobile_number' => 'required|max:255|unique:users',
            'address' => 'max:255',
            'password' => 'required|min:8|confirmed'
        ]);
        $request['password'] = Hash::make($request->password);

        if(User::create($request->all())){
            return redirect()->route('admin.users')->with('success', 'User created successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $q)
    {
        return view('back.user.edit')->with([
            'data' => $q
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $q)
    {
        if($request->type == 'info'){
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'max:255|unique:users,email,' . $q->id,
                'mobile_number' => 'required|max:255|unique:users,mobile_number,' . $q->id,
                'address' => 'max:255'
            ]);
        }else{
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
        }

        if($q->update($request->all())){
            return redirect()->back()->with('success', 'User updated successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $q)
    {
        // Delete Image
        if($q->image){
            $img = public_path() . '/uploads/user/' . $q->image;
            if (file_exists($img)) {
                unlink($img);
            }
        }

        if($q->delete()){
            return redirect()->back()->with('success', 'User deleted successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }
}
