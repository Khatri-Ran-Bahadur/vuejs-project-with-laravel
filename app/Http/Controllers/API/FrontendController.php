<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;
use App\Staff;
class FrontendController extends Controller
{
   public function getAbout(){
        return Settings::where('name','_about')->first();
   }

   public function get_underneath_organizations(){
        return Settings::where('name','_underneath_organizations')->first();
   }

    public function get_organization_chart(){
        return Settings::where('name','_organization_chart')->first();
   }

    public function get_policy_and_programmes(){
        return Settings::where('name','_policy_and_programmes')->first();
   }

   public function get_staff(){
        return Staff::all();
   }
}
