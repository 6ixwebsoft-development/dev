<?php

namespace App\Http\Controllers;

use App\Models\CmsPages;
use App\Models\PageBlocks;
use App\Models\PageMeta;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show(Request $request,$slug)
    {

        print_r(Session::get('language'));
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

        if($slug) {
            
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
        }else{
            return false;
        }
    }
}
