<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Youth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class YouthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $youths = Youth::all();

        return view('admin.youths.show',compact('youths'));
    }

    public function create()
    {
        $wards = Ward::all();
        return view('admin.youths.create',compact('wards'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'resume' => 'required|mimes:pdf|max:5048',
            'names' => 'required',
            'identification'=>'required|unique:youths',
            'mobile' => 'required|max:12|min:10',
            'ward' => 'required',
            'next_of_kin_names' => 'required',
            'next_of_kin_contacts' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'physical_address' => 'required',
            'next_of_kin_relationship' => 'required'


        ]);

        $youth = new Youth();
        $youth->names = $request->names;
        $youth->identification = $request->identification;
        $youth->mobile = $request->mobile;
        $youth->ward = $request->ward;
        $youth->next_of_kin_names = $request->next_of_kin_names;
        $youth->next_of_kin_contacts = $request->next_of_kin_contacts;
        $youth->next_of_kin_relationship = $request->next_of_kin_relationship;
        $youth->gender = $request->gender;
        $youth->dob = $request->dob;
        $youth->email = $request->email;
        $youth->physical_address = $request->physical_address;
        $youth->drug_abuse = $request->drug_abuse;
        $youth->health_condition = $request->health_condition;
        $youth->status = 1;
        // $youth->resume = $request->resume->store('public/files/resumes');
        
        $request->file('resume')->storeAs('files/resumes', $request->names.' CV.pdf');
        $path = "public/files/resumes/".$request->names." CV.pdf";
        $youth->resume = $path;
        $youth->save();

        return (redirect()->back()->with('success', 'Information successfully saved'));

    }

    public function show($id)
    {
        $youth = Youth::where('id', $id)->first();
        return view('admin.youths.view', compact('youth'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Youth::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Youth deleted successfully');
    }

    public function download($id){
        $youth = Youth::where('id', $id)->first();
        // $resume = public_path($youth->resume);
        return response()->download($youth->resume);
        // $file=Storage::disk('public')->get($youth->resume);
		// return (new Response($file, 200))
        //       ->header('Content-Type', 'pdf');
    }
}
