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
				'link' =>$link1,
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


