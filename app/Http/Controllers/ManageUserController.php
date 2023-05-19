<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('main.data-mahasiswa', [
            'data' => User::orderBy('user_type')->get(),
        ]);
    }

    public function create()
    {
        return view('main.form-tambah-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email:dns',
            'user_type' => 'required',
            'id' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);
        return back()->with('success', '<strong>Berhasil!</strong> User baru telah ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('main.form-edit-user', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'user_type' => $request->user_type,
            'email' => $request->email,
            'id' => $request->id,
        ]);
        return redirect('data-mahasiswa')->with('success', '<strong>Berhasil!</strong> Data user berhasil diubah.');
    }

    public function destroy(User $user)
    {
        $name = $user->name;
        $user->delete();
        return back()->with('success', "User <i><b>\"$name\"</b></i> berhasil dihapus.");
    }

    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make($user->id),
        ]);
        $ket = $user->user_type == 'dosen' ? 'NIP' : 'NIM (huruf besar)';
        return redirect('data-mahasiswa')->with('success', "<strong>Berhasil!</strong> Password user telah direset ke $ket.");
    }
}
