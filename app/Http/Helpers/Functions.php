<?php
function is_lib_user(){
	if(!empty(session('libarary_id'))){
		return true;
	}
	return false;
}