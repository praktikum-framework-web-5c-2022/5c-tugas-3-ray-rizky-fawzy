<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
        'npm',
        'nama',
        'prodi',
        'jk',
        'alamat',
        'tempat',
        'tgl_lahir',
        'photo',
    ];
    use HasFactory;
}
