<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->paginate(10);
        return view('cms.registrations.index', compact('registrations'));
    }

    public function store(Request $request)
    {
        $registration = new Registration();
        $registration->name = $request->name;
        $registration->father_spouse_name = $request->father_spouse_name;
        $registration->address = $request->address;
        $registration->locality_area = $request->locality_area;
        $registration->city = $request->city;
        $registration->district = $request->district;
        $registration->state = $request->state;
        $registration->contact_no = $request->contact_no;
        $registration->alternative_no = $request->alternative_no;
        $registration->mail_id = $request->mail_id;
        $registration->marital_status = $request->marital_status;
        $registration->family_members = $request->family_members;
        $registration->company_name = $request->company_name;
        $registration->company_address = $request->company_address;
        $registration->product_details = $request->product_details;
        $registration->product_category = $request->product_category;
        $registration->target_audience = $request->target_audience;
        $registration->social_media_links = $request->social_media_links;
        $registration->product_cost = $request->product_cost;
        $registration->id_proof = $request->id_proof;
        $registration->age = $request->age;
        $registration->date_of_birth = $request->date_of_birth;
        $registration->services_needed = $request->services_needed;

        $registration->save();

        return redirect()->back()->with('success', 'Registration submitted successfully!');
    }
}
