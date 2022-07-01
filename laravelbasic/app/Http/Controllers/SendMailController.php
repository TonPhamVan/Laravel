<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class SendMailController extends Controller
{
    public function sendMail() {
        $user = Users::find(8);
        // dd($user);
        $mailable = new HelloMail($user);
        Mail::to("victi6688@gmail.com")
        ->cc("victi2222@gmail.com")
        ->send($mailable);
        // Mail::to("victi6688@gmail.com")
        // ->cc("victi2222@gmail.com")
        // ->bcc("phamvanton.pvt@gmail.com")
        // ->queue($mailable);
        return true;
    }
    public function configMail() {
        return view('mails.configMail');
    }

    public function testMail() {
        return Redirect()->back();
    }
}
