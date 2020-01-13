<?php

namespace App\Http\Controllers\Admin\Menu;

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

class MenuController extends Controller
{
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
        
       return view('admin.menu.index');
    }
	
	
	public function create() 
    {
		  $language_id = Config::get('constants.settings.LANGUAGE_ID');
        $languages = Language::where('status', '1')->get();
		$pages =CmsPages::leftjoin('gg_page_translation as pt', 'gg_cms_pages.id', 'pt.page_id')
                        ->where('pt.language_id', $language_id)
                        ->select('gg_cms_pages.id', 'gg_cms_pages.status', 'pt.title')
                        ->get();
        return view('admin.menu.create')->with(compact('languages','pages'));
    }

    public function store(Request $request) 
    {
         
        try {
            $result = $request->all();
			//print_r($result);exit;
			$data = array("links"=>$result['urldata']);
            
			DB::table('gg_menu')->where('id', '1')->update($data);		
           
            
            $output = ['class' => 'alert-position-success',
                            'msg' => __("Menu added")
                            ];
        } catch (\Exception $e) {
            
            $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
			//echo $e;
        }

        return redirect('admin/menu/create')->with('message', $output);
        
    }
	
	public function getdatamenu()
	{
		$data = DB::table('gg_menu')->where('id', '1')->first();	
		return $data->links; exit;
	}
}
