<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TextInvitation;
use App\Mail\PictureInvitation;
use App\Mail\YoutubeInvitation;
use App\User;
use App\Patient;
use App\Invite;

use Mail;
use Hash;

class SendMailController extends Controller
{
    public function TextInvitation(Request $request){
        $email = $request->input('email');

        $user_data = [
            'password' => Hash::make(str_random(40)),
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
        ];

        $patientId = $request->input('patientId');
        $inviterId = $request->input('inviterId');

        $user = User::firstOrCreate(['email' => $email], $user_data);

        // TO DO: differentiate between new and existing users
        if ($user->wasRecentlyCreated === true) {
            // we'll send an introductory invite
        } else {
            // we'll send a new patient connection notification
        }

        $inviter = User::find($inviterId)->first_name;

        $patient = Patient::findOrFail($patientId);
        $patient->users()->attach($user->id);
        $patient_name = $patient->full_name;

        $token = str_random(40);

        $invite = [
            'email' => $user->email,
            'user_id' => $user->id,
            'token' => $token,
            'patient_id' => $patientId,
            'inviter_id' => $inviterId,
        ];

        Invite::create($invite);

        $data = [
            'patient' => $patient_name,
            'inviter' => $inviter,
            'token' => $token
        ];

        Mail::to($user)->send(new TextInvitation($data));

        return response()->success([], 204, 'Invitation email sent');
    }


    public function PictureInvitation(Request $request){
        $data = $request->all();

        Mail::to("vleminckx.cedric@hotmail.com")->send(new PictureInvitation($data));

        return response()->success([], 204, 'Invitation email sent');
    }

    public function YoutubeInvitation(Request $request){
        $data = $request->all();

        Mail::to("vleminckx.cedric@hotmail.com")->send(new YoutubeInvitation($data));

        return response()->success([], 204, 'Invitation email sent');
    }
}
