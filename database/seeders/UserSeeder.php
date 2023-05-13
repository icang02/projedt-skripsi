<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mahasiswa CUK
        User::create([
            'id' => 'E1E120011',
            'name' => 'Ilmi Faizan',
            'email' => 'ilmifaizan1112@gmail.com',
            'password' => Hash::make('skripsi'),
            'user_type' => 'mahasiswa',
        ]);
        User::create([
            'id' => 'E1E120059',
            'name' => 'Andini Septiani',
            'email' => 'andini@gmail.com',
            'password' => Hash::make('skripsi'),
            'user_type' => 'mahasiswa',
        ]);
        User::create([
            'id' => 'E1E120082',
            'name' => 'Muhammad Ikhwan',
            'email' => 'ikwan@gmail.com',
            'password' => Hash::make('skripsi'),
            'user_type' => 'mahasiswa',
        ]);

        // Dosen CUK
        User::create([
            'id' => '321321321321321321',
            'name' => 'Rizal Adi Saputra, S.T., M.Kom.',
            'email' => 'rizaladisaputra@gmail.com',
            'password' => Hash::make('skripsi'),
            'user_type' => 'dosen',
        ]);
        User::create([
            'id' => '123123123123123123',
            'name' => 'Ilmi Saputra, S.T., M.Kom.',
            'email' => 'bambangpramono@gmail.com',
            'password' => Hash::make('skripsi'),
            'user_type' => 'dosen',
        ]);
    }
}
