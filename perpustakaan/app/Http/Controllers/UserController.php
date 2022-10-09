<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::All();
        $data = [
            'data'=>$user
        ];
        return view('user.index', $data);
    }
}
