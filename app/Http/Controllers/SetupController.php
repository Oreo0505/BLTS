<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Term;
use App\Models\User;
use App\Traits\Upload;

class SetupController extends Controller
{
    use Upload;

    public function setup(Request $request)
    {

        // Validate the incoming request data

        $validator = Validator::make($request->all(), [
            'municipality' => 'required|string',
            'barangay' => 'required|string',
            'captain' => 'required|min:3',
            'secretary' => 'required|min:3',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
            'sb1' => 'required|min:3',
            'sb2' => 'required|min:3',
            'sb3' => 'required|min:3',
            'sb4' => 'required|min:3',
            'sb5' => 'required|min:3',
            'sb6' => 'required|min:3',
            'sb7' => 'required|min:3',
            'chairman' => 'required|min:3',
            'logo' => 'mimes:png,jpeg,jpg,bmp,svg',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ], [
            'municipality.required' => 'Please select a Municipality',
            'barangay.required' => 'Please select a Barangay',
            'captain.required' => 'Punong Barangay field is required',
            'captain.min' => 'Punong Barangay name should contain at least 3 characters',
            'secretary.required' => 'Barangay Secretary field is required',
            'secretary.min' => 'Barangay Secretary name should contain at least 3 characters',
            'from.required' => 'Term start date is required',
            'from.date' => 'Invalid date format',
            'to.required' => 'Term end date is required',
            'to.date' => 'Invalid date format',
            'to.after' => 'Term end date should be later than term start date',
            'sb1.required' => 'Sanggunian Member 1 is required',
            'sb1.min' => 'Sanggunian Member 1 name should contain 3 or more characters',
            'sb2.required' => 'Sanggunian Member 2 is required',
            'sb2.min' => 'Sanggunian Member 2 name should contain 3 or more characters',
            'sb3.required' => 'Sanggunian Member 3 is required',
            'sb3.min' => 'Sanggunian Member 3 name should contain 3 or more characters',
            'sb4.required' => 'Sanggunian Member 4 is required',
            'sb4.min' => 'Sanggunian Member 4 name should contain 3 or more characters',
            'sb5.required' => 'Sanggunian Member 5 is required',
            'sb5.min' => 'Sanggunian Member 5 name should contain 3 or more characters',
            'sb6.required' => 'Sanggunian Member 6 is required',
            'sb6.min' => 'Sanggunian Member 6 name should contain 3 or more characters',
            'sb7.required' => 'Sanggunian Member 7 is required',
            'sb7.min' => 'Sanggunian Member 7 name should contain at least 3 characters',
            'chairman.required' => 'SK Chairperson is required',
            'chairman.min' => 'SK Chairperson name should contain at least 3 characters',
            'logo.mimes' => 'File should be an image file',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password should contain at least 8 characters'
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                flash()->addError($message);
            }
            return back()->withInput();
        }


        $user_form = [
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        $user = User::create($user_form);
        $user_id = $user->id;
        
        $term_form = [
            'user_id' => $user_id,
            'start' => date("Y-m-d", strtotime($request->from)),
            'end' => date("Y-m-d", strtotime($request->to))
        ];
        $current_term = Term::create($term_form);
        $user->current_term = $current_term->id;
         

        if ($request->hasFile('logo')) {
            $path = $this->UploadFile($request->file('logo'), 'logo', 'Profile', 'public');
            $user->logo = $path;
            $user->save();
        }

       
        $user->save();

        $captain_form = [
            'name' => $request->captain,
            'user_id' => $user_id,
            'position' => 'Captain',
            'term_id' => $current_term->id
        ];
        Author::create($captain_form);

        $secretary_form = [
            'name' => $request->secretary,
            'user_id' => $user_id,
            'position' => 'Secretary',
            'term_id' => $current_term->id
        ];
        Author::create($secretary_form);

        $sb_members = [
            $request->sb1,
            $request->sb2,
            $request->sb3,
            $request->sb4,
            $request->sb5,
            $request->sb6,
            $request->sb7,
        ];

        foreach ($sb_members as $index => $sb_member) {
            $sb_form = [
                'name' => $sb_member,
                'user_id' => $user_id,
                'position' => 'SB Member ' . ($index + 1),
                'term_id' => $current_term->id
            ];
            Author::create($sb_form);
        }

        $chairman_form = [
            'name' => $request->chairman,
            'user_id' => $user_id,
            'position' => 'SK Chairman',
            'term_id' => $current_term->id
        ];
        Author::create($chairman_form);

        Auth::login($user);
        flash()->addSuccess('Registration successful');
        return redirect('/homepage')->with(['id' => $user->id]);
    }
}