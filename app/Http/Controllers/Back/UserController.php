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
        return view('back.users.index')->with([
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
        return view('back.users.create');
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
            return redirect()->route('back.users.index')->with('success', 'User created successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('back.users.edit')->with([
            'data' => $user
        ]);
    }

    // Show
    public function show(User $user)
    {
        return view('back.users.show')->with([
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->type == 'info'){
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'max:255|unique:users,email,' . $user->id,
                'mobile_number' => 'required|max:255|unique:users,mobile_number,' . $user->id,
                'address' => 'max:255'
            ]);
        }else{
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
        }

        if($user->update($request->all())){
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
    public function destroy(User $user)
    {
        // Delete Image
        if($user->image){
            $img = public_path() . '/uploads/user/' . $user->image;
            if (file_exists($img)) {
                unlink($img);
            }
        }

        if($user->delete()){
            return redirect()->back()->with('success', 'User deleted successfully.');
        }
        return redirect()->back()->with('error', 'Something wrong!');
    }
}
