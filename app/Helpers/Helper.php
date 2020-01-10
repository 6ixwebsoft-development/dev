<?php

	if (!function_exists('search_by_user_role')) {
	    function search_by_user_role($user_role)
	    {
	        // ...
	    }
	}
	
function getName()
{
	$result = DB::table('gg_menu')->select('id', 'links')->first(); 
	$data = json_decode($result->links,true);
	/* echo "<pre>";
	print_r($data);exit; */
	$mydata = array();
	foreach($data as $Data)
	{	
		$page = '';
		$link = '';
		$childone ='';
		$childonedata = array();
		$childtwo = '';
		$childtwodata = array();
		
		if($Data['page'] == 0)
		{
			$link = $Data['href'];
		}else{
			$page = $Data['page'];
		}
		if(isset($Data['children']))
		{
			$childone = true;
			$childdataone = $Data['children'];
			foreach($childdataone as $childdata)
			{
					if($childdata['page'] == 0)
					{
						$link = $childdata['href'];
					}else{
						$page = $childdata['page'];
					}
					//$childtwo = true;
					//$childonedata = $Data['children'];
					if(isset($Data['children']))
					{ 
						$childtwo = true;
						$childdatatwo = $childdata['children'];
						foreach($childdatatwo as $childdatatw)
						{
							if($childdatatw['page'] == 0)
								{
									$link = $childdatatw['href'];
								}else{
									$page = $childdatatw['page'];
								}
								
								$childtwodata[] = array(
								'name' =>$childdatatw['text'],
								'link' =>$link,
								'page' =>$page,
								'target' =>$childdatatw['target']
								); 
						}
						
					}
					$childonedata[] = array(
						'name' =>$childdata['text'],
						'link' =>$link,
						'page' =>$page,
						'target' =>$Data['target'],
						'childtwo' =>$childtwo,
						'child' =>$childtwodata
						); 
			}
		}
		$mydata[] = array(
				'name' =>$Data['text'],
				'link' =>$link,
				'page' =>$page,
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
function getnamebyPageId($id)
{
	
}


