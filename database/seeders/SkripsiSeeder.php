<?php

namespace Database\Seeders;

use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skripsi::create([
            'mhs_id' => 7,
            'judul' => 'Sistem Informasi Penyewaan Rumah Kontrakan Berbasis Web Dengan Menggunakan Metode Prototype',
            'pembimbing1_id' => 3,
            'pembimbing2_id' => 4,
            'status' => 'Proposal',
            'tgl_ujian' => '2023-04-10',
            'file_proposal' => null,
            'file_hasil' => null,
            'file_skripsi' => null,
        ]);
    }
}
