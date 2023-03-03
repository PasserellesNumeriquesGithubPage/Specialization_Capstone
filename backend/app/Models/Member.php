<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'fullName',
        'email',
        'password',
        'completeaddress',
        'contactnumber',
        'membership',
    ];

    public function coffee()
    {
        return $this->belongsToMany(Coffe::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class,'cart_members','members_id','cart_id');
    }
}
