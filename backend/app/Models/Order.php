<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'total'
    ];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
