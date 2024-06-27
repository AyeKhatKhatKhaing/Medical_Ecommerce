<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class SendSMSController extends Controller
{
        public function sendSMSVerification(Request $request)
        {
            $receiverNumber = +959457813110;
            $code = random_int(100000, 999999);
    
            try {
    
                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");
    
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number, 
                    'body' => $code]);
    
                dd('SMS Sent Successfully.');
    
            } catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
        }
}
