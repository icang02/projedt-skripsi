<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User Admin
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 'admin',
        ]);

        // User Dosen
        User::create([
            'nama' => 'Rizal Adi Saputra, ST., M.Kom.',
            'username' => '199104062018031021',
            'email' => 'rizaladisaputra@uho.ac.id',
            'password' => bcrypt('dosen'),
            'level' => 'dosen',
        ]);
        User::create([
            'nama' => 'Bambang Pramono, S.Si., MT.',
            'username' => '197104252008011010',
            'email' => 'bambang.pramono@uho.ac.id',
            'password' => bcrypt('dosen'),
            'level' => 'dosen',
        ]);
        User::create([
            'nama' => 'Asa Hari Wibowo, ST., M.Eng.',
            'username' => '19940817202231014',
            'email' => 'asa.hari@uho.ac.id',
            'password' => bcrypt('dosen'),
            'level' => 'dosen',
        ]);
        User::create([
            'nama' => 'Jumadil Nangi, S.Kom., MT.',
            'username' => '198702062015041003',
            'email' => 'jumadilnangi@uho.ac.id',
            'password' => bcrypt('dosen'),
            'level' => 'dosen',
        ]);
        User::create([
            'nama' => 'Isnawaty, S.Si., MT.',
            'username' => '197611172008122001',
            'email' => 'isnawaty@uho.ac.id',
            'password' => bcrypt('dosen'),
            'level' => 'dosen',
        ]);

        // User Mahasiswa
        User::create([
            'nama' => 'Muhammad Ikhwan',
            'username' => 'e1e120082',
            'email' => 'ikhwan@gmail.com',
            'password' => bcrypt('e1e120082'),
            'level' => 'mahasiswa',
        ]);
        User::create([
            'nama' => 'Andini Septiani',
            'username' => 'e1e120059',
            'email' => 'andini@gmail.com',
            'password' => bcrypt('e1e120059'),
            'level' => 'mahasiswa',
        ]);
    }
}
