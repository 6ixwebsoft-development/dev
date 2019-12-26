<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'gg_subject';
	protected $fillable = ['name'];
}
