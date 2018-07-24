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
    private function CheckUser($request){
        $email = $request->input('email');

        $user_data = [
            'password' => Hash::make(str_random(40)),
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
        ];

        //TODO: Get patientId and inviterId from frontend
        $patientId = $request->input('patientId');
        $inviterId = $request->input('inviterId');

        $this->user = User::where('email', '=', $email)->count();

        // Differentiate between new and existing users
        if ($this->user > 0) {
            // user exists
            $this->user = User::firstOrCreate(['email' => $email], $user_data);
            //email of person who sends email
            $inviterEmail = User::find($inviterId)->email;

            //person who is invited
            $inviter = $request->input('firstName');

            //Getting content and subject
            $content = $request->input('content');
            $subject = $request->input('subject');

            $data = [
                'inviter' => $inviter,
                'inviterEMail' => $inviterEmail,
                'sender' =>  $user_data['first_name'],
                'token' => 'NoToken',
                'content' => $content,
                'subject' => $subject
            ];

            return $data;
        } else {
            // Create new user
            $this->user = User::firstOrCreate(['email' => $email], $user_data);

            //email of person who sends email
            $inviterEmail = User::find($inviterId)->email;
            //person who is invited
            $inviter = $request->input('firstName');
            //Getting content and subject
            $content = $request->input('content');
            $subject = $request->input('subject');

            $patient = Patient::findOrFail($patientId);
            $patient->users()->attach($this->user->id);
            $patient_name = $patient->full_name;

            $token = str_random(40);

            $invite = [
                'email' => $this->user->email,
                'user_id' => $this->user->id,
                'token' => $token,
                'patient_id' => $patientId,
                'inviter_id' => $inviterId,
            ];

            Invite::create($invite);

            $data = [
                'inviter' => $inviter,
                'inviterEMail' => $inviterEmail,
                'sender' => $user_data['first_name'],
                'token' => $token,
                'content' => $content,
                'subject' => $subject
            ];

            return $data;
        }
        return null;
    }

    public function TextInvitation(Request $request){
        $data = $this->CheckUser($request);
        Mail::to($this->user)->send(new TextInvitation($data));
        return response()->success([], 204, 'Invitation email sent');
    }

    public function PictureInvitation(Request $request){
        $data = $this->CheckUser($request);
        Mail::to($this->user)->send(new PictureInvitation($data));
        return response()->success([], 204, 'Invitation email sent');
    }

    public function YoutubeInvitation(Request $request){
        $data = $this->CheckUser($request);
        Mail::to($this->user)->send(new YoutubeInvitation($data));
        return response()->success([], 204, 'Invitation email sent');
    }
}
