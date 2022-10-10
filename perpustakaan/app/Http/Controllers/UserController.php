<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users'=>User::orderBy('id', 'DESC')->paginate(),
        ]);
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "name"=> "required",
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
            "role_as"=> "required"
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_as' => $request->role_as
           ]);

    	return redirect()->route('admin.index')->with('success',"Create Successfully");
    }

    public function edit($id)
    {
        return view('admin.user.edit', [
        'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "name"=> "required",
            "role_as"=> "required"
        ]);
        User::where('id', $id)->update($validasi);
        return redirect()->route('admin.index')->with('success',"Updated Successfully");
    }

    public function destroy($id)
    {
       User::where('id', $id)->delete($id);
        return back()->with('success',"Deleted Successfully");
    }
}

