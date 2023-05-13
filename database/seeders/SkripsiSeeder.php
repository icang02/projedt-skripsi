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
        // Skripsi::create([
        //     'title' => 'Rancang Bangun Laptop Menggunakan Algoritma K-Means',
        //     'nim' => 'E1E120011',
        //     'nip1' => '123123123123123123',
        //     'nip2' => '323212321333232121',
        //     'status' => 'Proposal',
        //     'tgl_ujian' => '2023-04-10',
        //     'file' => 'skripsi.pdf',
        // ]);

        $status = ['Proposal', 'Hasil', 'Skripsi'];
        $nim = ['E1E120011', 'E1E120082', 'E1E120059'];
        $dosen = ['321321321321321321', '123123123123123123'];
        for ($i = 0; $i < 20; $i++) {
            $nip1 = random_int(900000000000000000, 999999999999999999);
            $nip1 = str_pad($nip1, 18, 0, STR_PAD_LEFT);

            $nip2 = random_int(900000000000000000, 999999999999999999);
            $nip2 = str_pad($nip2, 18, 0, STR_PAD_LEFT);

            $file = [null, 'file.pdf'];

            Skripsi::create([
                'title' => fake()->sentence(),
                'nim' => $nim[rand(0, 2)],
                'nip1' => $dosen[0],
                'nip2' => $dosen[1],
                'status' => $status[rand(0, 2)],
                'tgl_ujian' => fake()->date(),
                'file_proposal' => $file[rand(0, 1)],
                'file_hasil' => $file[rand(0, 1)],
                'file_skripsi' => $file[rand(0, 1)],
            ]);
        }
    }
}
