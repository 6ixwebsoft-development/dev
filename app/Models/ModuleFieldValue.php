<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleFieldValue extends Model
{
    //
    protected $table = 'gg_module_fields_values';
    protected $fillable = ['field_id', 'language_id', 'value', 'status'];
}
