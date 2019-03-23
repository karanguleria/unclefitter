<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model {

    protected $table = 'referral';
    protected $guarded = [];
 
    protected $hidden = [
         'remember_token',
    ];
}