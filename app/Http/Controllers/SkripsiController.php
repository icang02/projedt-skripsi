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
        if (auth()->user()->level == 'admin') {
            $data = Skripsi::all();
        } else if (auth()->user()->level == 'dosen') {
            $data = Skripsi::where('pembimbing1_id', auth()->user()->id)->orWhere('pembimbing2_id', auth()->user()->id)->get();
        }

        return view('main.tabel-skripsi', [
            'data' => $data,
        ]);
    }

    public function timeline()
    {
        $data = User::where('level', 'dosen')->get();
        return view('main.timeline', [
            'dosen' => $data,
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
