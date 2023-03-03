<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'coffee',
        'description',
        'normal_price',
        'regular_price',
        'vip_price'
    ];

    // public function mayowner(){
    //     return $this->belongsTo(User::class,'user_id');
    // }

    public function members()
    {
        return $this->belongsToMany(Members::class);
    }
}
