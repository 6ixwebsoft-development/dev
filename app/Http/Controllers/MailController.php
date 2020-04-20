<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
//foundation models
use App\Models\Foundation;
use App\Models\FoundationAdvertise;
use App\Models\FoundationAge;
use App\Models\FoundationApplication;
use App\Models\FoundationContact;
use App\Models\FoundationDates;
use App\Models\FoundationGender;
use App\Models\FoundationInstructions;
use App\Models\FoundationLocation;
use App\Models\FoundationPurpose;
use App\Models\FoundationSaveCount;
use App\Models\FoundationSubject;

use App\Models\UserSearchSave;
use App\Models\SearchCount;

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\User;
use Mail;
use App\Mail\sendEmail;
use Session;

class MailController extends Controller
{

    public function fundSearchEmail(Request $request) {

        if ($request->ajax()) {
            
        $foundationIds = $request->get('foundation_ids');
        
        $contact_details = array();

        if($foundationIds) {    
            $foundations = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                        ->leftjoin('gg_foundation_contact as gc', 'gg_foundation.id', 'gc.foundation_id')
                        ->select(
                            "gg_foundation.id",
                            "name",
                            "sort",
                            "administrator",
                            "asset",
                            "source",
                            "org_no",
                            "remarks",
                            "fa.who_can_apply",
                            "fa.purpose",
                            "fa.details",
                            "fa.misc",
                            "gc.phone_no",
                            "gc.mobile_no",
                            "gc.email",
                            "gc.website",
                            "gc.address1",
                            "gc.address2",
                            "gc.address3"
                        )
                        ->whereIn('gg_foundation.id', $foundationIds)
                        ->get();

            $html = '';
            foreach ($foundations as $key => $foundation) {
				$user = Auth::user();
				if(!empty($user)){
					$current_user_role = $user->getRoleNames(); 
					
					$check_display = UserSearchSave::where('user_id',$user->id)->where('foundation_id',$foundation->id)->first();
					if($check_display->display == 0)
					{
						 $contact_details[$key] = $html = '<p><b>foundation Id#: </b>'.$foundation->id.'</p>';
					}else{
						$html = '<p><b>Purpose: </b>'.$foundation->purpose.'</p>
							<p><b>Who Can Apply: </b>'.$foundation->who_can_apply.'</p>
							<p><b>Applications: </b>'.$foundation->details.'</p>
							<p><b>Contact Details:</b></p>
							<p>'.$foundation->address1.'</p><p>'.$foundation->address2.'</p><p>'.$foundation->address3.'</p><br>
							<p>PHONE: '.$foundation->phone_no.'</p><p>MOBILE: '.$foundation->mobile_no.'</p><p>E_MAIL: '.$foundation->email.'</p><p>Website: <a href="'.$foundation->website.'" target="blank">'.$foundation->website.'</a></p><p class="border"></p>';
						$contact_details[$key] = $html;	
					}
				} elseif(!empty(Session::get('remote_name'))){
					 $html = '<p><b>Purpose: </b>'.$foundation->purpose.'</p>
							<p><b>Who Can Apply: </b>'.$foundation->who_can_apply.'</p>
							<p><b>Applications: </b>'.$foundation->details.'</p>
							<p><b>Contact Details:</b></p>
							<p>'.$foundation->address1.'</p><p>'.$foundation->address2.'</p><p>'.$foundation->address3.'</p><br>
							<p>PHONE: '.$foundation->phone_no.'</p><p>MOBILE: '.$foundation->mobile_no.'</p><p>E_MAIL: '.$foundation->email.'</p><p>Website: <a href="'.$foundation->website.'" target="blank">'.$foundation->website.'</a></p><p class="border"></p>';
						$contact_details[$key] = $html;	  
				}else {
					$contact_details[$key] = "No Record...";
				}
                
            }
        } 
            return response()->json(array("details" => $contact_details, "email_details" => $foundations));
        }
    }

    public function foundationSearchSendMail(Request $request) {
        $result = $request->all();
        $email   = $request->email;
        $message = json_decode($request->message);
        
        Mail::to($email)->send(new sendEmail('GlobalGrant Fund', $message));
        return view('mail/thankyou-message');
    }
}
