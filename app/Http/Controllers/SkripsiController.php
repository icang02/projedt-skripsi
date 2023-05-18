<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class SkripsiController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_type == 'admin') {
            $data = Skripsi::all();
        } else if (auth()->user()->user_type == 'dosen') {
            $data = Skripsi::where('nip1', auth()->user()->id)->orWhere('nip2', auth()->user()->id)->get();
        }
        // dd($data);
        return view('main.tabel-skripsi', [
            'data' => $data,
        ]);
    }

    public function timeline()
    {
        return view('main.timeline', [
            'dosen' => User::where('user_type', 'dosen')->get(),
        ]);
    }

    public function uploadProposal(Request $request)
    {
        $fileProposal = $request->file('file_proposal')->store('file_proposal');

        Skripsi::create([
            'title' => $request->judul,
            'nim' => auth()->user()->id,
            'nip1' => $request->dosen1,
            'nip2' => $request->dosen2,
            'status' => 'Proposal',
            'file_proposal' => $fileProposal,
        ]);
        return back()->with('success', 'File proposal berhasil disimpan');
    }

    public function uploadHasil(Request $request)
    {
        $skripsi = Skripsi::where('nim', auth()->user()->id)->get()->first();
        $fileHasil = $request->file('file_hasil')->store('file_hasil');
        $skripsi->update([
            'file_hasil' => $fileHasil,
        ]);
        return back()->with('success', 'File hasil berhasil disimpan');
    }

    public function uploadSkripsi(Request $request)
    {
        $skripsi = Skripsi::where('nim', auth()->user()->id)->get()->first();
        $fileSkripsi = $request->file('file_skripsi')->store('file_skripsi');
        $skripsi->update([
            'file_skripsi' => $fileSkripsi,
        ]);
        return back()->with('success', 'File skripsi berhasil disimpan');
    }
}
