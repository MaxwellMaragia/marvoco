<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $nairobi_tel = Setting::where('name', 'nairobi-tel')->first();
        $nairobi_address = Setting::where('name', 'nairobi-address')->first();
        $nairobi_email = Setting::where('name', 'nairobi-email')->first();
        $nairobi_map_url = Setting::where('name', 'nairobi-map-url')->first();
        $nairobi_mobile_1 = Setting::where('name', 'nairobi-mobile-1')->first();
        $nairobi_mobile_2 = Setting::where('name', 'nairobi-mobile-2')->first();
        $nairobi_mobile_3 = Setting::where('name', 'nairobi-mobile-3')->first();
        $webuye_tel = Setting::where('name', 'webuye-tel')->first();
        $webuye_address = Setting::where('name', 'webuye-address')->first();
        $webuye_email = Setting::where('name', 'webuye-email')->first();
        $webuye_map_url = Setting::where('name', 'webuye-map-url')->first();
        $webuye_mobile_1 = Setting::where('name', 'webuye-mobile-1')->first();
        $webuye_mobile_2 = Setting::where('name', 'webuye-mobile-2')->first();
        $webuye_mobile_3 = Setting::where('name', 'webuye-mobile-3')->first();


        return view('admin.settings.contacts',compact('nairobi_tel','nairobi_address','nairobi_email','nairobi_map_url','nairobi_mobile_1','nairobi_mobile_2','nairobi_mobile_3','webuye_tel','webuye_address','webuye_email','webuye_map_url','webuye_mobile_1','webuye_mobile_2','webuye_mobile_3'));
    }

    public function store(Request $request){
        $nairobi_tel = Setting::where('name','nairobi-tel')->first();
        $nairobi_tel->value = $request->nairobi_tel;
        $nairobi_tel->save();

        $nairobi_mobile_1 = Setting::where('name','nairobi-mobile-1')->first();
        $nairobi_mobile_1->value = $request->nairobi_mobile_1;
        $nairobi_mobile_1->save();

        $nairobi_mobile_2 = Setting::where('name','nairobi-mobile-2')->first();
        $nairobi_mobile_2->value = $request->nairobi_mobile_2;
        $nairobi_mobile_2->save();

        $nairobi_mobile_3 = Setting::where('name','nairobi-mobile-3')->first();
        $nairobi_mobile_3->value = $request->nairobi_mobile_3;
        $nairobi_mobile_3->save();

        $nairobi_address = Setting::where('name','nairobi-address')->first();
        $nairobi_address->value = $request->nairobi_address;
        $nairobi_address->save();

        $nairobi_email = Setting::where('name','nairobi-email')->first();
        $nairobi_email->value = $request->nairobi_email;
        $nairobi_email->save();

        $nairobi_map_url = Setting::where('name','nairobi-map-url')->first();
        $nairobi_map_url->value = $request->nairobi_map_url;
        $nairobi_map_url->save();

        $webuye_tel = Setting::where('name','webuye-tel')->first();
        $webuye_tel->value = $request->webuye_tel;
        $webuye_tel->save();

        $webuye_mobile_1 = Setting::where('name','webuye-mobile-1')->first();
        $webuye_mobile_1->value = $request->webuye_mobile_1;
        $webuye_mobile_1->save();

        $webuye_mobile_2 = Setting::where('name','webuye-mobile-2')->first();
        $webuye_mobile_2->value = $request->webuye_mobile_2;
        $webuye_mobile_2->save();

        $webuye_mobile_3 = Setting::where('name','webuye-mobile-3')->first();
        $webuye_mobile_3->value = $request->webuye_mobile_3;
        $webuye_mobile_3->save();

        $webuye_address = Setting::where('name','webuye-address')->first();
        $webuye_address->value = $request->webuye_address;
        $webuye_address->save();

        $webuye_email = Setting::where('name','webuye-email')->first();
        $webuye_email->value = $request->webuye_email;
        $webuye_email->save();

        $webuye_map_url = Setting::where('name','webuye-map-url')->first();
        $webuye_map_url->value = $request->webuye_map_url;
        $webuye_map_url->save();

        return redirect()->back()->with('success','Contacts updated successfully');


    }
}
