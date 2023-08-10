<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function index(Request $request)
    {
        $subdomain = $request->subdomain;
        // Do something with the $subdomain...

        return view('subdomain.dashboard', ['subdomain' => $subdomain]);
    }
}
