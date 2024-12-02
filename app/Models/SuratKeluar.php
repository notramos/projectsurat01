<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [ 
    'nomor_surat',
    'tanggal_surat',
    'alamat',
    'categories_id',
    'penerima',
    'perihal',
];

   public function category()
   {
    return $this->belongsTo(Category::class , 'categories_id','id');
   }
}
