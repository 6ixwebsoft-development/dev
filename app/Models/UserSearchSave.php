<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSearchSave extends Model
{
    //
	protected $table = 'gg_user_search_save';
    protected $guarded = [];
	
	
	static function getFoundationCount($id)
	{
		return UserSearchSave::where('foundation_id',$id)->count();
	}
	
	static function getFoundationSavedByUser($id)
	{
		return UserSearchSave::where('foundation_id',$id)->count();
	}
	
	static function countFoundationSavedByUser($id)
	{
		return UserSearchSave::leftjoin('model_has_roles as hr', 'gg_user_search_save.user_id', 'hr.model_id')->where('foundation_id',$id)->whereNotIn('hr.role_id',[3, 12, 13])->count();
	}
	
	static function countFoundationSavedByStaff($id)
	{
		return UserSearchSave::leftjoin('model_has_roles as hr', 'gg_user_search_save.user_id', 'hr.model_id')->where('foundation_id',$id)->whereIn('hr.role_id',[3, 12, 13])->count();
	}
}
