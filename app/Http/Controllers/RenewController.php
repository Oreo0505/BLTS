<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\Term;
use App\Models\Config;
use App\Models\User;

class RenewController extends Controller
{
    public function renew(Request $request){
        $validator = Validator::make($request->all(),[
            'captain' => 'required|min:3',
            'secretary' => 'required|min:3',
            'from' => 'required|date|after:yesterday',
            'to' => 'required|date|after:from',
            'sb1' => 'required|min:3',
            'sb2' => 'required|min:3',
            'sb3' => 'required|min:3',
            'sb4' => 'required|min:3',
            'sb5' => 'required|min:3',
            'sb6' => 'required|min:3',
            'sb7' => 'required|min:3',
            'chairman' => 'required|min:3'
        ],
        [
            'captain.required' => 'Barangay captain field is required',
            'captain.min' => 'Barangay captain name should contain 3 or more character',
            'secretary.required' => 'Barangay secretary field is required',
            'secretary.min' => 'Barangay secretary name should contain 3 or more character',
            'from.required' => 'Term start date is required',
            'from.date' => 'Term period should be later than yesterday',
            'from.after' => 'Term start date',
            'to.required' => 'Term end date is required',
            'to.date' => 'Invalid date format',
            'to.after' => 'Term end date should be later than term start date',
            'sb1.required' => 'Sanggunian Member 1 is required',
            'sb1.min' => 'Sanggunian Member 1 name shoud contain 3 or more character',
            'sb2.required' => 'Sanggunian Member 2 is required',
            'sb2.min' => 'Sanggunian Member 2 name shoud contain 3 or more character',
            'sb3.required' => 'Sanggunian Member 3 is required',
            'sb3.min' => 'Sanggunian Member 3 name shoud contain 3 or more character',
            'sb4.required' => 'Sanggunian Member 4 is required',
            'sb4.min' => 'Sanggunian Member 4 name shoud contain 3 or more character',
            'sb5.required' => 'Sanggunian Member 5 is required',
            'sb5.min' => 'Sanggunian Member 5 name shoud contain 3 or more character',
            'sb6.required' => 'Sanggunian Member 6 is required',
            'sb6.min' => 'Sanggunian Member 6 name shoud contain 3 or more character',
            'sb7.required' => 'Sanggunian Member 7 is required',
            'sb7.min' => 'Sanggunian Member 7 name shoud contain 3 or more character',
            'chairman.required' => 'SK Chairman is required',
            'chairman.min' => 'SK Chairman name shoud contain 3 or more character'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }
        $user = Auth::user();
        $user_id = $user->id;
       
        $term_form = [
            'start' => date("Y-m-d", strtotime($request->from)),
            'end' => date("Y-m-d", strtotime($request->to)),
            'user_id'=>$user_id
        ];
        $current_term = Term::create($term_form);

        
        $user->current_term = $current_term->id;
        $user->save();

        $captain_form = [
            'name' => $request->captain,
            'user_id'=>$user_id,
            'position' => 'Captain',
            'term_id' => $current_term->id
        ];
        Author::create($captain_form);

        $secretary_form = [
            'name' => $request->secretary,
            'user_id'=>$user_id,
            'position' => 'Secretary',
            'term_id' => $current_term->id
        ];
        Author::create($secretary_form);
        
        $sb_members = array(
            $request->sb1,
            $request->sb2,
            $request->sb3,
            $request->sb4,
            $request->sb5,
            $request->sb6,
            $request->sb7,
        );

        $i = 1;
        foreach($sb_members as $sb_member){
            $sb_form = [
                'name' => $sb_member,
                'user_id'=>$user_id,
                'position' => 'SB Member '.$i,
                'term_id' => $current_term->id
            ];
            Author::create($sb_form);
            $i++;
        }

        $chairman_form = [
            'name' => $request->chairman,
            'user_id'=>$user_id,
            'position' => 'SK Chairman',
            'term_id' => $current_term->id
        ];
        Author::create($chairman_form);

        flash()->addSuccess('Profile renewed successfully');
        return redirect('/homepage');
    }
}
