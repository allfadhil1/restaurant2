<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function bookings()
    {
        return $this->belongsToMany(Booking::class)->withPivot('quantity')->withTimestamps();
    }

    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'harga', 'gambar'];
}
