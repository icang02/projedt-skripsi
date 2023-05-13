<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    protected $guarded = [' '];
    public $timestamps = false;

    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'nim', 'id');
    }

    public function dosen1()
    {
        return $this->belongsTo(User::class, 'nip1', 'id');
    }

    public function dosen2()
    {
        return $this->belongsTo(User::class, 'nip2', 'id');
    }
}
