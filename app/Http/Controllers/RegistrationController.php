<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;  // Added this import
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('cms.registrations.index');
    }

    public function getData()
    {
        try {
            $registrations = Registration::select([
                'id', 'name', 'contact_no', 'mail_id', 'company_name',
                'product_details', 'city', 'state'
            ]);

            return DataTables::of($registrations)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<button type="button" class="btn btn-primary btn-sm view-details" data-id="'.$row->id.'">View More</button>';
                })
                ->editColumn('product_details', function($row) {
                    return Str::limit($row->product_details, 50);
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('DataTables Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return response()->json($registration);
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'father_spouse_name' => 'required|string|max:255',
                'address' => 'required|string',
                'locality_area' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'district' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'contact_no' => 'required|string|max:15',
                'alternative_no' => 'nullable|string|max:15',
                'mail_id' => 'required|email|max:255',
                'marital_status' => 'required|string|max:50',
                'family_members' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'company_address' => 'required|string',
                'product_details' => 'required|string',
                'product_category' => 'required|string|max:255',
                'target_audience' => 'required|string|max:255',
                'social_media_links' => 'nullable|string',
                'product_cost' => 'required|numeric',
                'id_proof' => 'required|string|max:255',
                'age' => 'required|integer|min:1|max:150',
                'date_of_birth' => 'required|date',
                'services_needed' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create new registration
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

            return response()->json([
                'success' => true,
                'message' => 'Registration submitted successfully!'
            ], 200);

        } catch (\Exception $e) {
            Log::error('Registration Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your registration. Please try again.'
            ], 500);
        }
    }
}
