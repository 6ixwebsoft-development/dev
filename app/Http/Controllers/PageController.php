<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPages;
use App\Models\PageBlocks;
use App\Models\PageMeta;
use App\Models\PageTranslation;

class PageController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show($slug)
    {
        echo $slug;exit;
        if($slug) {
            
            $page_data = PageTranslation::where('gg_page_translation.url', 'like', $slug.'%')->where('language_id','1')
                                    ->get();
            /*leftjoin('gg_page_blocks as pb', function($join) {
                            $join->on('pb.page_id', '=', 'gg_page_translation.page_id')
                                ->on('pb.language_id', '=', 'gg_page_translation.language_id');
                    })*/

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
    }
}
