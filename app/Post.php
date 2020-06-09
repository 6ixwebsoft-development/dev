<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class Post extends Model
{
    //
    protected $guarded = [];
    protected $appends = [
    	'for_day'
    ];
    //protected $fillable = ['recipient_type','recipients'];
    protected $image_path = '/images/users/posts';
    public function store($postData)
    {
        //$postData['data'] = json_decode(json_encode($postData['data']),true);
        // print_r(json_encode($postData));
        // die();
        $postData['media_type'] = $postData['mtype'];
        if($postData['mtype'] == 'image'){
            $postData['media_link'] = $this->base64ToImage($postData['data']);        
        }elseif($postData['mtype'] == 'video'){
            $postData['media_link'] = $filename = md5(microtime()).".mp4";
        }   
        unset($postData['data']);    
        unset($postData['mtype']);

    	$postData['user_id'] = Auth()->user()->id;
    	//print_r($postData);

    	$post = new Post;
        if(empty($postData['send_date'])){
            $postData['day'] = Auth()->user()->dayold;    
        }        
        return $post->create($postData);

    }
    public function storeV($postData,$id)
    {
        //$postData['data'] = json_decode(json_encode($postData['data']),true);
        // print_r(json_encode($postData));
        // die();        
        if($postData['mtype'] == 'video'){

            if($request->hasFile('data')){
                $file = $request->file('data');
                $postData['media_link'] = $filename = md5(microtime()).".mp4";
                $path = public_path().'/images/users/posts/';
                $file->move($path, $filename);
            }

            unset($postData['data']);    
            unset($postData['mtype']); 
            $md5 = md5(microtime());
            $postData['media_link'] = $filename = $md5.".mp4";
            $thumb = VideoThumbnail::createThumbnail(public_path('/images/users/posts/'.$filename), public_path("'/images/users/posts/'"), $md5.'.jpg', 2, 600, 600);

        }       
        $postData['user_id'] = Auth()->user()->id;
        //print_r($postData);

        $post = new Post;
        if(empty($postData['send_date'])){
            $postData['day'] = Auth()->user()->dayold;    
        }
        return $post->create($postData);

    }
    public function base64ToImage($image)
    {
    	$image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpeg';

        \File::put(public_path($this->image_path). '/' . $imageName, base64_decode($image));
        return $imageName;
    }
    public function myPosts()
    {
    	return Post::where('user_id',Auth()->user()->id)->orderBy('created_at', 'DESC')->get();
    }

    public function getMediaLinkAttribute($Attribute)
    {   
        if(!empty($Attribute)){
            return URL($this->image_path."/".$Attribute);    
        }     
        return false;
        
    }

    public function getForDayAttribute()
    {        
        //return URL($this->image_path."/".$Attribute);
        //$start = Carbon::parse(Auth()->user()->created_at);
        //$end = Carbon::parse($this->created_at);
        if(!empty($this->day)){
            $date['day'] = $this->day;
        }else{            
            $date['day'] = Carbon::parse($this->send_date)->format("M d, Y");            
        }
        
        $time = Carbon::parse($this->created_at);
        $date['time'] = $time->format('h:i A');
        return $date;
    }
    
    // public function update($array)
    // {
    //     foreach ($array as $key => $value) {
    //         $this->$key = $value;
    //     }
    //     $this->save();
    // }

    public function getToBeSend($login=false)
    {   
        $user = User::all();     
        foreach($user as $row ){
            $old  = $row->dayold;
            $date = Carbon::parse($this->created_at);
            $date = $date->format('Y-m-d');
            //return Post::where(['user_id' => Auth()->user()->id,"day" => $old,"send_date" => $date ])->orderBy('created_at', 'DESC')->get();
            //DB::enableQueryLog(); // Enable query log
            $qq = Post::                     
                            
                            Where(function ($query)use ($old)
                            {
                                //$old  = $row->dayold;
                                $date = Carbon::parse($this->created_at);
                                $date = $date->format('Y-m-d');
                                //print_r(['day' => $old,'send_date' => $date]);
                                $query->orWhere(['day' => $old,'send_date' => $date]);
                            });
                            $qq->where(['sent' => 0]);
                            // if($login){
                            //     $qq->where(['user_id' => Auth()->user()->id,'sent' => 0]);
                            // }
                            return $qq->orderBy('created_at', 'DESC')->get();
        }                
    }
}
