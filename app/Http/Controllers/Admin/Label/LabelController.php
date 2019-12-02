<?php

namespace App\Http\Controllers\Admin\Label;
use App\Models\Label;
use App\Models\Language;
use App\Models\Translation;
use App\Models\Label_group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, $id) {
        $column_data = Label_group::leftjoin('gg_label_translations as lt', 'gg_labels.id', '=', 'lt.keyword_id')
            ->join('gg_languages', 'lt.language_id', '=', 'gg_languages.id')
            ->where('gg_labels.group_id', '=', $id)
            ->where('gg_languages.status', '=', 1)
            ->select('gg_languages.language')
            ->get();
            $group_name = Translation::where('id', '=', $id)->get();
            $group = $group_name[0]->group;

        $language_table_col = array();
        foreach($column_data as $key => $column_name) {
           
            $language_table_col[$column_name->language] = $column_name->language;
        } 
    	if ($request->ajax()) {
            $data = Label_group::join('gg_label_translations as lt', 'gg_labels.id', '=', 'lt.keyword_id')
                ->leftjoin('gg_languages', 'lt.language_id', '=', 'gg_languages.id')
                ->where('gg_labels.group_id', '=', $id)
                ->where('gg_languages.status', '=', 1)
                ->select('lt.keyword_id', 'gg_labels.label', 'gg_languages.language', 'lt.translation', 'gg_languages.locale')
                ->get();
            $data_array_merge = array();
            $default_translation = '';
            foreach($data as $data_value) {
                if($data_value->locale == 'en_US') {
                    $default_translation = $data_value->translation;
                }
            }
            foreach($data as $data_value) {
                if(empty($data_value->translation)) {
                    $data_value->translation = $default_translation;
                }
                $data_array_merge[$data_value->label]['id'] = $data_value->keyword_id;
                $data_array_merge[$data_value->label]['keyword'] = $data_value->label;
                $data_array_merge[$data_value->label][$data_value->language] = $data_value->translation;
            }
           
            return Datatables::of($data_array_merge)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="'.url('admin').'/label/'.$row['id'].'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/label/delete/'.$row['id'].'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);  
               
        }
    
       return view('admin.label.index')->with(compact('id', 'language_table_col', 'group'));
    }
    public function create() {
        $data = Language::all()->where('status', 1);
        $group_name = Translation::where('id', '=', $_GET['id'])->get();
            $group = $group_name[0]->group;
        return view('admin.label.create')->with(compact('data', 'group'));
    }
    public function edit($id)
    {
        $data = Label_group::join('gg_label_translations as lt', 'gg_labels.id', '=', 'lt.keyword_id')
                ->rightjoin('gg_languages', 'lt.language_id', '=', 'gg_languages.id')
                ->where('gg_labels.id', '=', $id)
                ->where('gg_languages.status', '=', 1)
                ->select('lt.keyword_id', 'gg_labels.label', 'gg_languages.language', 'lt.translation', 'lt.language_id', 'gg_labels.group_id')
                ->get();
        $group_id = $data[0]->group_id;
        $group_name = Translation::where('id', '=', $group_id)->get();
        $group = $group_name[0]->group;
      
        $data_array_merge = array();
        foreach($data as $data_value) {
            $data_array_merge['id'] = $data_value->keyword_id;
            $data_array_merge['label'] = $data_value->label;
            $data_array_merge[$data_value->language_id.'_'.$data_value->language] = $data_value->translation;
        }
        $label = $data_array_merge;
        
        return view('admin.label.edit')->with(compact('label', 'group', 'group_id'));
    }
    public function store(request $request) {
        
        try {  
            if(empty($request->keyword)) {
                $output = $output = ['class' => 'alert-position-success',
                    'msg' => __("Keyword field cannot be empty")
                ];
                return back()->with('message', $output);
            }
            $translation_label = array(
                'group_id' => $request->group_id,
                'label' => $request->keyword
            );
            $label_group_data = Label_group::firstOrCreate($translation_label);
             if($label_group_data->wasRecentlyCreated){
                      
                foreach($request->locale as $key => $value) {
                   
                    $locale = array(
                        'keyword_id' =>  $label_group_data->id, 
                        'language_id' => $request->id[$key],
                        'translation' => $value
                );
                    Label::create($locale);

                 }
            } else {
                    $output = ['class' => 'alert-position-success',
                    'msg' => __("Already exist")
                ];
                    $url = 'admin/label/create?id='.$request->group_id;
                   return redirect($url)->with('message', $output);
                    }
            $output = ['class' => 'alert-position-success',
                    'msg' => __("label added")
                ];
        } catch (\Exception $e) {
            $output = ['class' => 'alert-position-danger',
                'msg' => __("something went wrong!")
            ];
        }
        $url = 'admin/'.$request->group_id.'/label';
        return redirect($url)->with('message', $output);
        
    }
    public function update(Request $request) 
    {
       
        try {
               $label_model = Label_group::where('id', '=', $request->id)->firstOrFail();
               $label_model->label = $request->label;
               $label_model->save();
               $i = 0;
               foreach($request->locale as $language) {
                    $label_translation_model = Label::where('keyword_id', '=', $request->id)
                                        ->where('language_id', '=', $request->language_id[$i])
                                        ->firstOrFail();
                    $label_translation_model->translation = $request->locale[$i];
                    $label_translation_model->save();
                    $i++;
               }
              
                $output = ['class' => 'alert-position-success',
                    'msg' => __("label updated")
                ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                    'msg' => __("something went wrong!")
                ];
            
            }

            $url = 'admin/'.$request->group_id.'/label';
        return redirect($url)->with('message', $output);
    }
    public function destroy($id)
    {
      
        try {
            
            $label_model = Label_group::where('id', '=', $id);
            $label_model->delete();
            $label_translation_model = Label::where('keyword_id', '=', $id);
            $label_translation_model->delete();

            $output = ['class' => 'alert-position-success',
                    'msg' => __("label deleted")
                ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                    'msg' => __("something went wrong!")
                ];
            
            }
         return back()->with('message', $output);
    }


    
}
