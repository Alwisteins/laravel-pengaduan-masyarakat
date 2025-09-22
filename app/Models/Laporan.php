<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'tanggal',
        'gambar',
        'status',
        'respon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusClassAttribute()
    {
        return match ($this->status) {
            'Selesai' => 'bg-success',
            'Diproses' => 'bg-warning',
            default => 'bg-danger',
        };
    }
}
