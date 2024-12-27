<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class Employee extends Model
{
    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
