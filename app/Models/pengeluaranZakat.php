<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranZakat extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_zakat';
    protected $fillable = [
        'nama',
        'tanggal',
        'berat',
        'asal',
    ];
}
