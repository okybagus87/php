<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "Mahasiswa";
    protected $fillable = ['id', 'nim', 'nama', 'jenisKelamin', 'umur', 'updated_at', 'created_at'];
}
