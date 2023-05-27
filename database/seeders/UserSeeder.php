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
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('user'),
            'level' => 'admin',
        ]);

        User::create([
            'nama' => 'Ilmi Faizan',
            'username' => 'e1e120011',
            'email' => 'ilmifaizan@gmail.com',
            'password' => bcrypt('user'),
            'level' => 'mahasiswa',
        ]);

        User::create([
            'nama' => 'Dosen 1, S.Pd.',
            'username' => '100000000000000000',
            'email' => 'dosen1@gmail.com',
            'password' => bcrypt('user'),
            'level' => 'dosen',
        ]);
        User::create([
            'nama' => 'Dosen 2, S.T., M.T.',
            'username' => '200000000000000000',
            'email' => 'dosen2@gmail.com',
            'password' => bcrypt('user'),
            'level' => 'dosen',
        ]);
    }
}
