<?php

namespace App\Http\Controllers;

use App\Models\CmsPages;
use App\Models\PageBlocks;
use App\Models\PageMeta;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use App\Models\Foundation;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
	public function __construct()
    {
		if(empty(Session::get('language')))
		{
			Session::put('language', 'se');
			session()->put('locale', 'se');
		}
		
    }
	
	public function language(Request $request,$lan)
	{
		Session::put('language', $lan);
		session()->put('locale', $lan);
		if(\Session::has('locale'))
		   {
			\App::setlocale(\Session::get('locale'));
		   }
		$backurl = url()->previous();
		/* echo $backurl;exit; */
		$urldata = explode("/",$backurl);
		//echo str_replace('/en', '', $backurl);exit;
		
		if($lan != 'en'){
			$url = str_replace('/en', '', $backurl);
			return redirect($url);
		}else{
			if($urldata[3] == 'en'){
				return redirect()->back();
			}else{
				$url = str_replace($urldata[2], $urldata[2].'/en', $backurl);
				return redirect($url);
			}
		}
		
	}
	
	
    public function show(Request $request,$slug)
    {
       // print_r(Session::get('language'));
        switch (Session::get('language')) {
            case 'en':
                 $lang = 1;
                break;
            case 'se':
                 $lang = 2;
                break;
            default:
                $lang = 2;
                break;
        }
        $slug = $request->segment(1);
        if(!empty($request->segment(2))){
            $slug = $request->segment(2);    
        }
        // print_r($slug);
        // die();
        if(!empty($slug)){
            $pages = ['contact-us','/','en'];
            if(in_array($slug,$pages)){
                switch ($slug) {
                    case 'contact-us':
                            return view('contact-us');
                        break;

                    case 'en':
                            return view('welcome');
                        break;
                    case '/':
                            return view('welcome');
                        break;    
                }
            }else{
            
                $page_data = PageTranslation::where('gg_page_translation.url', 'like', $slug.'%')->where('language_id',$lang)
                                        ->get();
                /*leftjoin('gg_page_blocks as pb', function($join) {
                                $join->on('pb.page_id', '=', 'gg_page_translation.page_id')
                                    ->on('pb.language_id', '=', 'gg_page_translation.language_id');
                        })*/
                // print_r($page_data);
                // die();        
                    
                foreach ($page_data as $page) {
                    $page_blocks = PageBlocks::where('page_id', $page->page_id)
                                            ->where('language_id', $page->language_id)
                                            ->get();

                    $page_meta_data = PageMeta::where('page_id', $page->page_id)
                                            ->where('language_id', $page->language_id)
                                            ->get();
                }
                return view('pages')->with(compact('page_data', 'page_blocks', 'page_meta_data'));
            }
            
        }else{
            return false;
        }
    }
	
	public function contactus()
	{
		 return view('contact-us');
	}
	public function home()
	{
		 return view('welcome');
	}
	
	public function pagination_data()
	{
		$found = Foundation::paginate(50);
		return view('tetstt')->with(compact('found'));
	}
	
}
