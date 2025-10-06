<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getStatusBadgeAttribute()
    {
        $badgeClass = match ($this->status) {
            'Selesai' => 'bg-success',
            'Diproses' => 'bg-warning',
            default => 'bg-danger',
        };

        return "<span class='badge {$badgeClass}'>{$this->status}</span>";
    }

    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn($gambar) => $gambar ? asset('storage/' . $gambar) : asset('/images/no-image.png')
        );
    }

    protected function tanggal(): Attribute
    {
        return Attribute::make(
            get: fn($tanggal) => Carbon::parse($tanggal)->locale('id')->translatedFormat('l, d F Y')
        );
    }

    protected $casts = [
        'tanggal' => 'date',
    ];
}
