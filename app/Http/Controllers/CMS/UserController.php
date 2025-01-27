<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function adminLogin()
    {
        // dd(Hash::make('rkvadmin@rkv.com'));
        return view('cms.login');
    }

    public function adminAuth(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $success = 0;
            $message = $validate->errors()->first();
            $success_array['data'] = array(
                'code' => $success,
                'message' => $message,
            );
        } else {
            $user_list = User::where('email', $request['email'])->first();
            if ($user_list) {
                if (Hash::check($request['password'], $user_list->password)) {
                    $randomString = Str::random(60);
                    $update_array = array(
                        // 'last_login' => date('Y-m-d'),
                        'remember_token' => $randomString,
                    );
                    User::where('id', $user_list->id)->update($update_array);
                    $request->session()->put('user_id', $user_list->id);
                    $request->session()->put('user_name', $user_list->name);

                    $success = 1;
                    $message = "Success";
                    $success_array['data'] = array(
                        'code' => $success,
                        'message' => $message,
                    );
                } else {
                    $success = 0;
                    $message = "Invalid credantials";
                    $success_array['data'] = array(
                        'code' => $success,
                        'message' => $message,
                    );
                }
            } else {
                $success = 0;
                $message = "";
                $success_array['data'] = array(
                    'code' => $success,
                    'message' => $message,
                );
            }
        }
        return response()->json($success_array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
