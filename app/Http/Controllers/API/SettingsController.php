<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;
use App\Contact;

class SettingsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
        //$this->authorize('isAdmin');
    }
    
   public function getAbout(){
        return Settings::where('name','_about')->first();
   }
   public function postAbout(Request $request){
   		$about=Settings::where('name','_about')->first();
   		if($about){
   			$about->value=$request->about;
   			$about->update();
   			return ['message'=>'success'];
   		}else{
   			return Settings::create([
	            'name'  => '_about',
	            'value'  => $request['about']
	        ]);
   			
   		}
   } 

   public function getUnderneathOrganizations(){
        return Settings::where('name','_underneath_organizations')->first();
   }
   public function postUnderneathOrganizations(Request $request){
      $underneath_rganizations=Settings::where('name','_underneath_organizations')->first();
      if($underneath_rganizations){
        $underneath_rganizations->value=$request->details;
        $underneath_rganizations->update();
        return ['message'=>'success'];
      }else{
        return Settings::create([
              'name'  => '_underneath_organizations',
              'value'  => $request['details']
          ]);
        
      }
   }

   public function get_organization_chart(){
        return Settings::where('name','_organization_chart')->first();
   }
   public function post_organization_chart(Request $request){
      $organization_chart=Settings::where('name','_organization_chart')->first();
      if($organization_chart){
        $organization_chart->value=$request->details;
        $organization_chart->update();
        return ['message'=>'success'];
      }else{
        return Settings::create([
              'name'  => '_organization_chart',
              'value'  => $request['details']
          ]);
        
      }
   }

   public function get_policy_and_programmes(){
        return Settings::where('name','_policy_and_programmes')->first();
   }
   public function post_policy_and_programmes(Request $request){
      $policy_and_programmes=Settings::where('name','_policy_and_programmes')->first();
      if($policy_and_programmes){
        $policy_and_programmes->value=$request->details;
        $policy_and_programmes->update();
        return ['message'=>'success'];
      }else{
        return Settings::create([
              'name'  => '_policy_and_programmes',
              'value'  => $request['details']
          ]);
        
      }
   }

   public function getContactus(){
        $data=Settings::where('name','_contactus')->first();
        return unserialize($data->value);
   }
   public function postContactus(Request $request){
   		$contact=new Contact();
		$contact->phone=$request->phone;
		$contact->fax=$request->fax;
		$contact->email=$request->email;
		$contact->website=$request->website;
		$contact->notice=$request->notice;
		$contact->facebook=$request->facebook;
		$contact->twitter=$request->twitter;
		$contact->youtube=$request->youtube;

   		$contactus=Settings::where('name','_contactus')->first();
   		if($contactus){   			
			$contactus->name='_contactus';
   			$contactus->value=serialize($contact);
   			$contactus->save();
   			return ['message'=>'success'];
   		}else{
   			$data=new Settings();
   			$data->name='_contactus';
   			$data->value=serialize($contact);
   			$data->save();
   			return ['message'=>'success'];
   			
   		}
   }


}
