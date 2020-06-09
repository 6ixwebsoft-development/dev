<?php

namespace App\Http\Controllers;

use App\Functions;
use App\Post;
use App\Rules\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    private $func;
    public function __construct(){
        $this->func = new Functions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // print_r($request->all());
        // echo "asasasasas";
        // die();
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'string', 'max:255'],
            'image' => [''],
            'recipients' => ['required',new Emails($request->get('recipient_type'))],
            'recipient_type' => ['required'],
            'send_date' => ['date'],
            'day' => ['numaric']
        ]);
        // $image = str_replace('data:image/jpeg;base64,', '', $image);
        // $image = str_replace(' ', '+', $image);
        // $imageName = str_random(10).'.'.'jpg';
        //    Validator::extend('is_jpeg',function($attribute, $value, $params, $validator) {
        //     $image = base64_decode($value);
        //     $f = finfo_open();
        //     $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        //     return $result == 'image/jpeg';
        // });
        if($validator->fails()){            
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }

        $postData = $validator->getData();
        // $postData['recipient_type'] = $postData['recipientType'];
        // unset($postData['recipientType']);
        $post = new Post;
        if($data = $post->store($postData)){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Added Successfully !!!"),"data" => $data]);
        }
    }

    public function videoadd($id,Request $request)
    {

        $validator = Validator::make($request->all(), [            
            'ionicfile' => ['required'],            
        ]);

        if($validator->fails()){            
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }

        $post = Post::find($id);
        if(!empty($post)){

            if($request->hasFile('ionicfile')){
                $file = $request->file('ionicfile');
                $filename = $post->media_link;
                $path = public_path().'/images/users/posts/';
                $file->move($path, $filename);
            }

            //$filename = md5(microtime()).".mp4";
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Added Successfully !!!")]);
            
        }else{
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("Something went wrong !!!")]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id = '')
    {
        $post = new Post;
        if(!empty($id)){
            $post = $post->find($id);
        }else{
            $post = $post->myPosts();
        }        

        if($post->count() > 0){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Fetched Successfully !!!"),'data' => $post,"show" => false]);
        }else{
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("No Posts !!"),'error' => 'No Posts !!',"show" => false]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => ['string', 'max:255'],            
            'recipients' => [new Emails($request->get('recipient_type'))],
            'recipient_type' => [],
            'send_date' => ['date']
        ]);
        
        if($validator->fails()){            
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }
        //echo $id;
        $data = $validator->getData();
        $post = Post::find($id->id);
        if(!empty($data['send_date'])){
            $post->send_date = $data['send_date'];
            $post->day = NULL;    
        }
        if($post->update($data)){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Posts Updated !!"),"show" => true]);    
        }
        return response()->json(['status' => false, 'message' => $this->func->lang_slug("No Posts !!"),'error' => 'No Posts !!',"show" => true,"data" => $request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //print_r($post);
        if(!empty($post)){
            $post->delete();    
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Deleted Successfully !!!"),"show" => false]);
        }
        return response()->json(['status' => false, 'message' => $this->func->lang_slug("No Posts !!"),'error' => 'No Posts !!',"show" => true]);
        
    }
    public function status(Request $request,post $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required']
        ]);
        
        if($validator->fails()){            
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }
        //print_r($validator->getData()['status']);
        $id->status = $validator->getData()['status'];
        if($id->save()){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Status Changed !!"),'post' => $id]);
        }else{
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("Something went wronge !!")]);
        }
        
    }
    public function getToBeSend()
    {
        $post = new Post();
        $post = $post->getToBeSend();
        return response()->json(['status' => true, 'message' => $this->func->lang_slug("Post Status Changed !!"),'post' => $post]);
    }
}
