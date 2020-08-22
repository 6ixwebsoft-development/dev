<?php

namespace App\models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Library extends Model {
	protected $table = 'library_basic';
	protected $appends = [
		'tstatus',
		'roles'
	];
	public function getTstatusAttribute() {
		switch ($this->status) {
		case 1:
			return '<label class="badge badge-success">Active</label>';
			break;
		case 0:
			return '<label class="badge badge-danger">Inactive</label>';
			break;
		default:
			return $this->status;
			break;
		}
	}
	static function delete_data($id) {
		$data = array(
			'name' => 'DELETE_' . $id . '@globalgarnt.com',
			'groupid' => null,
			'languageid' => null,
			'logintype' => null,
			'usernumber' => null,
			'availability' => null,
			'status' => 3,
			'remark' => null,
		);
		$queryRun = Library::where('userid', $id)->update($data);if ($queryRun) {return true;} else {return false;}
	}

	function getRolesAttribute() 
	{		
		$user =  User::where(['id' => $this->userid])->first();
		return $user->roles()->first()->id;
	}

}
