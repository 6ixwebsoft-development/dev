<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
	//
	protected $table = 'gg_city';
	protected $guarded = [];

	protected $appends = [
		'tstatus',
	];
	public function getTstatusAttribute() {
		switch ($this->status) {
		case 1:
			//return '<label class="badge badge-success">Active</label>';
			return 'Active';
			break;
		case 0:
			//return '<label class="badge badge-danger">Inactive</label>';
			return 'Inactive';
			break;
		default:
			return $this->status;
			break;
		}
	}
}
