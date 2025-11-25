<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsip';

    protected $fillable = [
        'nama_file',
        'jenis_arsip',
        'path_file',
        'metadata_tanggal',
        'metadata_fotografer',
        'deskripsi',
        'tipe_mime',
        'ukuran_file',
        'id_user',
        'diunggah_oleh',
    ];
}
