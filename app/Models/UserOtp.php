<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Exception;
use Twilio\Rest\Client;

class UserOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'expire_at'
    ];

    public function sendSMS($receiver)
    {
        $message = 'Login OTP is '.$this->otp;

        try {
            $account_id = getenv("TWILIO_SID");
            $account_token = getenv("TWILIO_TOKEN");
            $account_form = getenv("TWILIO_FROM");

            $client = new Client($account_id,$account_token);

            $client->messages->create($receiver,array(
                'from'=>$account_form,
                'body'=>$message
            ));

            info('OTP Send Successfully');
        }
        catch (Exception $e)
        {
         info("Error: ".$e->getMessage());
        }
    }
}
