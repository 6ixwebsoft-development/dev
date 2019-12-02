<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    //
	protected $table = 'gg_modules';
	protected $fillable = ['name', 'status'];
}
