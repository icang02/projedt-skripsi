<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $skripsiMhs = Skripsi::where('mhs_id', auth()->user()->id)->get()->first();

        if ($skripsiMhs == null) {
            $result = [
                'dosen' => $data,
            ];
        } else {
            $result = [
                'dosen' => $data,
                'skripsiMhs' => $skripsiMhs,
            ];
        }

        // dd($result);
        return view('main.timeline', $result);
    }

    public function downloadProposal(Skripsi $skripsiMhs)
    {
        $fileString = explode(".", $skripsiMhs->file_proposal);
        $formatFile = end($fileString);

        $namaFile = str()->slug("file-proposal-$skripsiMhs->judul") . ".$formatFile";

        return Storage::download($skripsiMhs->file_proposal, $namaFile);
    }

    public function downloadHasil(Skripsi $skripsiMhs)
    {
        $fileString = explode(".", $skripsiMhs->file_hasil);
        $formatFile = end($fileString);

        $namaFile = str()->slug("file-hasil-$skripsiMhs->judul") . ".$formatFile";

        return Storage::download($skripsiMhs->file_hasil, $namaFile);
    }

    public function downloadSkripsi(Skripsi $skripsiMhs)
    {
        $fileString = explode(".", $skripsiMhs->file_skripsi);
        $formatFile = end($fileString);

        $namaFile = str()->slug("file-skripsi-$skripsiMhs->judul") . ".$formatFile";

        return Storage::download($skripsiMhs->file_skripsi, $namaFile);
    }

    public function uploadProposal(Request $request)
    {
        // cek data mahasiswa sudah ada atau belum di tabel skripsi
        $skripsiMhs = Skripsi::where('mhs_id', auth()->user()->id)->get()->first();
        if ($skripsiMhs == null) {
            $fileProposal = $request->file('file_proposal')->store('file_proposal');
            Skripsi::create([
                'judul' => $request->judul,
                'mhs_id' => auth()->user()->id,
                'pembimbing1_id' => $request->dosen1,
                'pembimbing2_id' => $request->dosen2,
                'status' => 'Proposal',
                'file_proposal' => $fileProposal,
            ]);
        } else {
            Storage::delete($skripsiMhs->file_proposal);
            $fileProposal = $request->file('file_proposal')->store('file_proposal');
            $skripsiMhs->update([
                'judul' => $request->judul,
                'pembimbing1_id' => $request->dosen1,
                'pembimbing2_id' => $request->dosen2,
                'file_proposal' => $fileProposal,
            ]);
        }

        return back()->with('success', 'File proposal berhasil disimpan');
    }

    public function uploadHasil(Request $request)
    {
        $skripsiMhs = Skripsi::where('mhs_id', auth()->user()->id)->get()->first();

        if (is_null($skripsiMhs->file_hasil)) {
            $fileHasil = $request->file('file_hasil')->store('file_hasil');
        } else {
            Storage::delete($skripsiMhs->file_hasil);
            $fileHasil = $request->file('file_hasil')->store('file_hasil');
        }

        $skripsiMhs->update([
            'file_hasil' => $fileHasil,
        ]);
        return back()->with('success', 'File hasil berhasil disimpan');
    }

    public function uploadSkripsi(Request $request)
    {
        $skripsiMhs = Skripsi::where('mhs_id', auth()->user()->id)->get()->first();

        if (is_null($skripsiMhs->file_skripsi)) {
            $fileSkripsi = $request->file('file_skripsi')->store('file_skripsi');
        } else {
            Storage::delete($skripsiMhs->file_skripsi);
            $fileSkripsi = $request->file('file_skripsi')->store('file_skripsi');
        }

        $skripsiMhs->update([
            'file_skripsi' => $fileSkripsi,
        ]);
        return back()->with('success', 'File hasil berhasil disimpan');
    }

    public function editTglUjian(Request $request, Skripsi $skripsi)
    {
        $skripsi->update([
            'tgl_ujian' => $request->tgl_ujian
        ]);
        return back()->with('success', 'Tanggal ujian diupdate.');
    }
}
