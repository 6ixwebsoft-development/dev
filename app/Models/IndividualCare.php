<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualCare extends Model {
	protected $table = 'individual_care';public static function delete_data($id) {

		$data = array('careillness' => null, 'caresymptoms' => null, 'carehospital' => null, 'carehealthregion' => null, 'careaddtionalinfo' => null);

		$queryRun = IndividualCare::where('userid', $id)->update($data);if ($queryRun) {return true;} else {return false;}}

}
