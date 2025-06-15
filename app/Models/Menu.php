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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'harga', 'gambar', 'category_id',];
}
