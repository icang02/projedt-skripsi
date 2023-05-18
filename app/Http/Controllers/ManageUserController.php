<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('main.data-mahasiswa', [
            'data' => User::orderBy('user_type')->get(),
        ]);
    }
}
