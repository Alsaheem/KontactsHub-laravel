<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model

{
    protected $fillable = [
        'name', 'email','nickname', 'phone_1', 'phone_2','address'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
