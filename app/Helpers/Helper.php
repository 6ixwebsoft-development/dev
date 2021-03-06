<?php

	if (!function_exists('search_by_user_role')) {
	    function search_by_user_role($user_role)
	    {
	        // ...
	    }
	}
	
function getName($place)
{
	if($place == 'header')
	{
		$result = DB::table('gg_menu')->select('id', 'links')->first(); 
	}else{
		$result = DB::table('gg_menu')->select('id', 'links')->OrderBy('id','DESC')->first(); 
	}
	
	$data = json_decode($result->links,true);
	/*  echo "<pre>";
	print_r($data);exit;  */
	$mydata = array();
	foreach($data as $Data)
	{	
		$page1 = '';
		$link1 = '';
		$page2 = '';
		$link2 = '';
		$page3 = '';
		$link3 = '';
		$childone ='';
		$childonedata = array();
		$childtwo = '';
		$childtwodata = array();
		if(!empty($Data['page']))
		{
			if($Data['page'] == 0 )
			{
				$link1 = $Data['href'];
			}else{
				$page1 = $Data['page'];
			}
		}else{
			$page1 = null;
		}
		
		if(!empty($Data['children']))
		{
			$childone = true;
			$childdataone = $Data['children'];
			foreach($childdataone as $childdata)
			{
					if($childdata['page'] == 0 || $childdata['page'] == '')
					{
						$link2 = $childdata['href'];
					}else{
						$page2 = $childdata['page'];
					}
					//$childtwo = true;
					//$childonedata = $Data['children'];
					if(!empty($childdata['children']))
					{ 
						$childtwo = true;
						$childdatatwo = $childdata['children'];
						foreach($childdatatwo as $childdatatw)
						{
							if($childdatatw['page'] == 0 || $childdatatw['page'] == '')
								{
									$link3 = $childdatatw['href'];
								}else{
									$page3 = $childdatatw['page'];
								}
								
								$childtwodata[] = array(
								'name' =>$childdatatw['text'],
								'link' =>$link3,
								'page' =>$page3,
								'target' =>$childdatatw['target']
								); 
						}
						
					}
					$childonedata[] = array(
						'name' =>$childdata['text'],
						'link' =>$link2,
						'page' =>$page2,
						'target' =>$Data['target'],
						'childtwo' =>$childtwo,
						'child' =>$childtwodata
						); 
			}
		}
		$mydata[] = array(
				'name' =>$Data['text'],
				'link' =>$Data['href'],
				'page' =>$page1,
				'target' =>$Data['target'],
				'childone' =>$childone,
				'child' =>$childonedata,
			); 
	}
	//exit;
	//echo '<pre>';
	//print_r($mydata);exit;
	return $mydata;
	
}
function geturlbyPageId($id)
{
	$result = DB::table('gg_page_translation')->select('url')->where('page_id',$id)->first(); 
	if(!empty($result->url))
	{return $result->url;}
	else
	{return false;}
}

function getfrontuserdata($id,$type='')
{
	if($type == 'IND')
	{
		$result = DB::table('individual_contact')->where('userid',$id)->first(); 
	}
	else if($type == 'LIB')
	{
		$result = DB::table('library_contact')->where('userid',$id)->first(); 
	}else{
		
		$result = DB::table('userinfo')->where('userid',$id)->first();
	}
	
	if(!empty($result))
	{return $result;}
	else
	{return false;}
}

function get_permission_id($name)
{
	
	$result = DB::table('permissions')->where('name',$name)->first(); 
	if(!empty($result->id))
	{return $result->id;}
	else
	{return false;}
} 

function get_language_name($id)
{
	$result = DB::table('gg_languages')->where('id',$id)->first(); 
	if(!empty($result->language))
	{return $result->language;}
	else
	{return false;}
}

function get_country_name($id)
{
	$result = DB::table('gg_country')->where('id',$id)->first(); 
	if(!empty($result->country_name))
	{return $result->country_name;}
	else
	{return false;}
}

function get_city_name($id)
{
	$result = DB::table('gg_city')->where('id',$id)->first(); 
	if(!empty($result->city_name))
	{return $result->city_name;}
	else
	{return false;}
}

function get_region_name($id)
{
	$result = DB::table('gg_region')->where('id',$id)->first(); 
	if(!empty($result->region_name))
	{return $result->region_name;}
	else
	{return false;}
}

function get_countryBlock_name($id)
{
	$result = DB::table('gg_country_block')->where('id',$id)->first(); 
	if(!empty($result->name))
	{return $result->name;}
	else
	{return false;}
}

function get_Library_name($id)
{
	$result = DB::table('library_basic')->where('id',$id)->first(); 
	if(!empty($result->name))
	{return $result->name;}
	else
	{return false;}
}

function routeName($url)
{	
    $routes = app('router')->getRoutes()->match(app('request')->create($url));	
	$route = $routes->action['controller'];
	$route = explode("\\",$route);
	$route = end($route);
	$controller_action = explode('@', $route);
	if($controller_action[1] == 'store'){
			$controller_action[1] = 'create';
			$controller_action = implode('-', $controller_action);
	}else if($controller_action[1] == 'update'){
			$controller_action[1] = 'edit';
			$controller_action = implode('-', $controller_action);
	}else{
			$controller_action = implode('-', $controller_action);
	}

	return $controller_action;
    
    //return $routes->action['as'];
}
function getlocation($val,$txt)
{
	if($txt == 'countryBlock'){
		$d = get_countryBlock_name($val);
	}elseif($txt == 'country'){
		$d = get_country_name($val);
	}elseif($txt == 'region'){
		$d = get_region_name($val);
	}elseif($txt == 'city'){
		$d = get_city_name($val);
	}
	return $d;
}
function Ican(){

	$user = Auth::user();
	//dd(session('checkip'));
    if($user) {

        $roles = $user->roles->pluck('id')->toArray(); 
        //$permissions = $user->getPermissionsViaRoles();

    }elseif(is_lib_user()){
    	//$user = is_lib_user_data();
    	//dd(session('user_id'));
    	$sub = DB::table('gg_subscription')->where('userid',session('user_id'))->first(); 
    	// dd($sub);
    	// die();
		if(!empty($sub->end_date) && date('y-m-d') <= date('y-m-d',strtotime($sub->end_date))){
			$roles[] = 9;
		}else{
			$roles[] = 4;	
		}
    	//dd($user);
    	//die();
    	//$roles[] = 4;


    } else {

        //User00 - Anonymous user
        $roles[] = 4;
        //print_r($roles);
        //$permissions = $role->getAllPermissions();

    }

    if(in_array(1, $roles)){
    	return true;
    }
    // if(in_array(9, $roles)){
    // 	return true;
    // }else 
    if(in_array(4, $roles) || !isInArray([9,5], $roles)){
        return false;
    }else{
        return true;
    }

}

function rip_some_html($val)
{
	return preg_replace('/\s+/', ' ',str_replace('&nbsp;',' ',preg_replace('#(<br */?>\s*)+#i', '<br />', strip_tags($val,'<br>'))));
}

function is_lib_user(){
	if(!empty(session('libarary_id')) && !empty(session('user_id'))){
		return true;
	}
	return false;
}

function is_admin()
{
	if(Auth::user()->isAdministrator()){
		return true;
	}
	return false;
}

function isInArray($needle, $haystack) 
{
    foreach ($needle as $stack) {
        if (in_array($stack, $haystack)) {
        	return true;
        }
    }
    return false;
}
function randomPass($v='')
{
	return substr(md5(microtime().$v),0,8);
}

function text_proper($str)
{
	// $cleanStr = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $str)));
	// // $cleanStr = str_replace("&nbsp;","123",$cleanStr);
	// $cleanStr = preg_replace("/(<br>|<br\s\/>)/", "", $cleanStr);
	// return $cleanStr;
	//$str=str_replace("/<[\S]+><\/[\S]+>/gim", );
	$str = strip_tags($str,'<p><li><br>');
	return $str;
	// $doc = new DOMDocument;
	// $doc->preserveWhiteSpace = false;
	// $doc->loadHtml($str);

	// $xpath = new DOMXPath($doc);

	// foreach( $xpath->query('//*[not(node())]') as $node ) {
	//     $node->parentNode->removeChild($node);
	// }

	// $doc->formatOutput = true;
	// return $doc->savexml();
}

function show_search_list($count)
{
	$p30 = $count*30/100;

	if($p30 > 14){
		return ceil($p30);
	}else{
		return $p30;
	}
}


function mysql_strict($status)
{
	config()->set('database.connections.mysql.strict', $status);
	\DB::reconnect(); //important as the existing connection if any would be in strict mode
	
}

function get_setting($val)
{
	return app('config')->get($val);
}