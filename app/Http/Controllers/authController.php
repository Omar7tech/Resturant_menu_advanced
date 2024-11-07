<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        // Check if the request is a POST request
        if ($request->isMethod("post")) {
            // Validate input fields
            $validated_data = $request->validate([
                "username" => "required|string",
                "password" => "required|string"
            ]);

            // Attempt to authenticate with the provided credentials
            if (Auth::attempt($validated_data)) {
                // Redirect to the intended page or dashboard
                return redirect()->intended('admin.home');
            } else {
                // Redirect back with an error message and old input data
                return back()->withErrors([
                    'login_error' => 'Invalid username or password.',
                ])->withInput();
            }
        }

        // Show the login form if the request is not POST
        return view("auth.login");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
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
}
