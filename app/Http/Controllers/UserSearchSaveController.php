<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserSearchSave;
use App\Models\SearchCount;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DB;
//use Hash;
class UserSearchSaveController extends Controller
{
    
	public function saveSearch(Request $request)
    {
        if($request->ajax()) {

            $user = Auth::user();
            if($user) {
                
                $foundationIds = $request->get('foundation_ids');
                if(!empty($foundationIds)) {
                    foreach ($foundationIds as $foundationId) {
                        $data = array(
                                "user_id" => $user->id,
                                "foundation_id" => $foundationId
                        );
                        $savedSearchResult = UserSearchSave::where('user_id', $user->id)->where('foundation_id', $foundationId)->first();                
                        
                        if(empty($savedSearchResult)) {
                            
                            UserSearchSave::create($data);

                            $savedCount = SearchCount::where('foundation_id', $foundationId)->first();
                            if(!empty($savedCount)) {
                                SearchCount::where('foundation_id', $foundationId)
                                        ->update([
                                          'count'=> DB::raw('count+1')
                                        ]);
                            } else {
                                $countData = array("foundation_id" => $foundationId, "count" => 1);
                                SearchCount::create($countData);
                            }
                            $message = "Foundation Saved Successfully!";
                        } else {
                            
                            UserSearchSave::where('foundation_id', $foundationId)
                                            ->where('user_id', $user->id)
                                            ->delete();
                            $savedCount = SearchCount::where('foundation_id', $foundationId)->first();
                            if(!empty($savedCount)) {
                                SearchCount::where('foundation_id', $foundationId)
                                        ->update([
                                          'count'=> DB::raw('count-1')
                                        ]);
                            }

                            $message = "Foundation removed from favourite Successfully!";
                            //return response()->json(array("status" =>1, "message" => "Already Saved Foundation!"));
                        }
                    }
                    return response()->json(array("status" =>1, "message" => $message));
                } else {
                    return response()->json(array("status" =>1, "message" => "Please select foundations for save."));
                }
            } else {
                return response()->json(array("status" =>0, "message" => "Go to Login or Register first!"));
                //return redirect()->route('/user-register');
            }
        }
    }
}
