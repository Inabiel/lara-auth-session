<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Siswa extends Model
{
    use Uuid;
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'tgl_lahir',
        'jk',
        'alamat',
        'email'
    ];

}
