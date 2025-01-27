<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'father_spouse_name' => 'required|string|max:255',
            'address' => 'required|string',
            'locality_area' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'alternative_no' => 'nullable|string|max:20',
            'mail_id' => 'required|email|max:255',
            'marital_status' => 'required|string|max:255',
            'family_members' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'product_details' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'target_audience' => 'required|string|max:255',
            'social_media_links' => 'nullable|string|max:255',
            'product_cost' => 'required|numeric',
            'id_proof' => 'required|string|max:255',
            'age' => 'required|integer',
            'date_of_birth' => 'required|date',
            'services_needed' => 'required|string'
        ]);

        Registration::create($validatedData);

        return redirect()->back()->with('success', 'Registration submitted successfully!');
    }

    public function index()
    {
        $registrations = Registration::latest()->paginate(10);
        return view('cms.registrations.index', compact('registrations'));
    }
}
