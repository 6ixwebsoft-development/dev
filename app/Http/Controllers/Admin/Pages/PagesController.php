<?php

namespace App\Http\Controllers\Admin\Pages;
use App\Models\Language;
use App\Models\CmsPages;
use App\Models\PageBlocks;
use App\Models\PageMeta;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;
use Config;

class PagesController extends Controller
{
    public function __construct()
    {
    //
    }
    
    public function index(Request $request) 
    {        
        //$language_id = env("DEFAULT_LANGUAGE");
        $language_id = Config::get('constants.settings.LANGUAGE_ID');

    	if ($request->ajax()) {
            
            $data = CmsPages::leftjoin('gg_page_translation as pt', 'gg_cms_pages.id', 'pt.page_id')
                        ->where('pt.language_id', $language_id)
                        ->select('gg_cms_pages.id', 'gg_cms_pages.status', 'pt.title')
                        ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row) {
                        if($row->status == 1) {
                            $s_btn = '<span class="badge badge-success">Active</span>';
                        }else {
                            $s_btn = '<span class="badge badge-danger">Inactive</span>';
                        }
                      return  $s_btn;
                    })
                   ->escapeColumns([])
                    ->addColumn('action', function($row){
   
                          $btn  = '<a href="'.url('/').'/admin/pages/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('/').'/admin/pages/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       return view('admin.pages.index');
    }

    public function create() 
    {
    
        $languages = Language::where('status', '1')->get();
        return view('admin.pages.create')->with(compact('languages'));
    
    }

    public function store(Request $request) 
    {
         
        try {
            $result = $request->all();
           
            $page = array("status" => $result['status']);
            $page_id = CmsPages::insertGetId($page);

            foreach ($result as $key => $page_data) {
                if($key != '_token' && $key != 'status') {
                    $pages_translation = array(
                            "page_id" => $page_id,
                            "title" => $page_data['title'],
                            "url"   => $page_data['url'],
                            "language_id" => $key,
                            "short_description" => $page_data['short_description'],
                            "status" => $result['status']
                    );
                    PageTranslation::insert($pages_translation);
                    foreach ($page_data['text'] as $page_block) {
                        $page_blocks = array(
                                "page_id" => $page_id,
                                "language_id" => $key,
                                "text" => $page_block,
                                "status" => $result['status']
                        );

                        PageBlocks::insert($page_blocks);
                    }

                    $page_meta = array(
                                "page_id" => $page_id,
                                "language_id" => $key,
                                "meta_title" => $page_data['meta_title'],
                                "meta_keyword" => $page_data['meta_keyword'],
                                "meta_description" => $page_data['meta_description']
                        );

                    PageMeta::insert($page_meta);
                }

            }
            
            $output = ['class' => 'alert-position-success',
                            'msg' => __("page added")
                            ];
        } catch (\Exception $e) {
            
            $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }

        return redirect('admin/pages')->with('message', $output);
        
    }
    public function edit($id)
    {
        $languages = Language::all();
        $blocks = array();
        foreach($languages as $language) {
            $page_blocks = PageBlocks::where('page_id', $id)->where('language_id', $language->id)->get();
            $blocks[$language->id] = $page_blocks;
        }
        $page_meta = PageMeta::where('page_id', $id)->get();
        $page_translation = PageTranslation::where('page_id', $id)->get();
        $id = $id;   
        return view('admin.pages.edit')->with(compact('languages', 'blocks', 'page_meta', 'page_translation', 'id'));
    }

    public function update(Request $request, $id) 
    {
         
        try {
            $result = $request->all();
            
            $page = array("status" => $result['status']);
            CmsPages::where('id', $id)->update($page);
            foreach ($result as $key => $page_data) {
                if($key != '_token' && $key != 'status' && $key != '_method') {
                    $pages_translation = array(
                            "page_id" => $id,
                            "title" => $page_data['title'],
                            "url"   => $page_data['url'],
                            "language_id" => $key,
                            "short_description" => $page_data['short_description'],
                            "status" => $result['status']
                    );

                    PageTranslation::where('page_id', $id)
                                            ->where('language_id', $key)
                                            ->update($pages_translation);
                    foreach ($page_data['text'] as $page_block) {
                        $page_blocks = array(
                                "page_id" => $id,
                                "language_id" => $key,
                                "text" => $page_block,
                                "status" => $result['status']
                        );

                        PageBlocks::where('page_id', $id)
                                    ->where('language_id', $key)
                                    ->update($page_blocks);
                    }

                    $page_meta = array(
                                "page_id" => $id,
                                "language_id" => $key,
                                "meta_title" => $page_data['meta_title'],
                                "meta_keyword" => $page_data['meta_keyword'],
                                "meta_description" => $page_data['meta_description']
                        );

                    PageMeta::where('page_id', $id)
                              ->where('language_id', $key)
                              ->update($page_meta);
                }

            }
            
            $output = ['class' => 'alert-position-success',
                            'msg' => __("page updated")
                            ];
        } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
            }

           return redirect('admin/pages')->with('message', $output);
    }
     public function delete($id)
    {
        try{
            $cms_pages = CmsPages::findOrFail($id);
            $cms_pages->delete();
            PageBlocks::where('page_id', $id)->delete();
            PageMeta::where('page_id', $id)->delete();
            PageTranslation::where('page_id', $id)->delete();
            $output = ['class' => 'alert-position-success',
                        'msg' => __("page deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }

        return redirect('admin/pages')->with('message', $output);
    }
    
}
