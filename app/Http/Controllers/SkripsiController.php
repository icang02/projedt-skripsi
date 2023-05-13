<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function index()
    {
        $data = Skripsi::all();
        return view('main.tabel-skripsi', [
            'data' => $data,
        ]);
    }
}
