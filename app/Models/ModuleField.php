<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleField extends Model
{
    //
    protected $table = 'gg_module_fields';
    protected $fillable = ['module_id', 'field_name', 'field_type', 'status'];
}
