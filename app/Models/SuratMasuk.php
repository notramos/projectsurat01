<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'pengirim',
        'perihal',
    ];
}
