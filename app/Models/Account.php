<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'currency',
        'balance',
        'user_id',


    ];

    public function transactions(){

        return $this->hasMany(Transaction::class, 'account_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
