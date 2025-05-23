<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('quantity');
    }

    protected $fillable = [
        'user_id',
        'table_id',
        'start_time',
        'end_time',
        'total_price',
    ];

}
