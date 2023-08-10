<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function SchoolStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:schools,name',
            'email' => 'required|unique:schools,email',
            'phone' => 'required|unique:schools,phone',
        ]);

        $school_name = trim($request->name);
        $subdomain = '';

        // Check if the school name has more than two words
        $words = explode(' ', $school_name);
        if (count($words) > 2) {
            // Generate subdomain using initials of each word
            foreach ($words as $word) {
                $subdomain .= strtolower(substr($word, 0, 1));
            }
        } else {
            $subdomain = strtolower(str_replace(' ', '', $school_name));
        }

        $data = new School();
        $data->admin_id = $request->admin_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->subdomain = $subdomain;
    
        $data->save();

        $notification = array(
            'message'=> 'School information submitted successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }
}
