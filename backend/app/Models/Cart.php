<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'coffee',
        'price',
        'qty',
        'total',
    ];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
