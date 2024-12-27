<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Support\Facades\Blade;

class Group extends Model
{
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }
}
