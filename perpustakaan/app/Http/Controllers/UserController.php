<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'users'=>User::orderBy('id', 'DESC')->paginate(),
        ]);
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            "name"=> "required",
            "role_as"=> "required"
        ]);

        $user = new User;
 
        $user->name = $request->name;
        $user->role_as = $request->role_as;
        $user->save();
       
        User ::create($validasi);
        return redirect()->route('admin.index')->with('success',"Create Successfully");
    }

    public function edit($id)
    {
        return view('admin.edit', [
            'admin' => User::find($id),
        ]);
    }
  
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "name"=> "required",
            "role_as"=> "required"
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->role_as = $request->role_as;
        $user->save();

        User::where('id', $id)->update($validasi);
        return redirect()->route('admin.index')->with('success',"Updated Successfully");
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete($id);
        return back()->with('success',"Deleted Successfully");
    }
}

