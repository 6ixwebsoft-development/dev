<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Language extends Model
{
	use SoftDeletes;
    protected $table = 'gg_languages';
    protected $guarded = [];
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
	
    protected $dates = ['deleted_at'];
}
