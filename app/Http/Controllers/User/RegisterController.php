<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class RegisterController extends Controller
{
    public function showform() {
      code_image();
      return view('front.login');
    }

    public function refresh_code(){
        code_image();
        return "done";
    }

    public function register(Request $request)
    {
          //--- Validation Section
          $rules = [
              'type'   => 'required',
              'username'   => 'required|max:50|unique:users',
              'email'   => 'required|email|max:255|unique:users',
  		        'password' => 'required|confirmed',
              'code' => [
                 'required',
                  function ($attribute, $value, $fail) {
                      $capstr = session('captcha_string');
                      if ($value != $capstr){
                        return $fail("Code doesn't match!");
                      }
                  },
              ],
          ];
          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          //--- Validation Section Ends

	        $gs = Generalsetting::findOrFail(1);
	        $input = $request->all();
	        $input['password'] = bcrypt('secret');
	        $token = md5(time().$request->name.$request->email);
	        $input['verification_link'] = $token;
			    $user = User::create($input);
	        
//           $service = \App::make('auth0');
//     $isLoggedIn = $service->getUser();
//     // $isLoggedIn['profile']['sub']=explode('|', $isLoggedIn['profile']['sub']);
//     // $isLoggedIn['profile']['sub']=$isLoggedIn['profile']['sub'][1];
//     //admin@laravel-bap.com
//     // echo "<pre>";
//     // print_r($isLoggedIn);
//     // die();
//     $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://".config('laravel-auth0.domain')."/oauth/token",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "{\"client_id\":\"OIig8wkSyQNGoZZkF8dsbkYVwTilNd4d\",\"client_secret\":\"IBk09TTvKO-Kpc4dWEEr1i2FJujIIgZSzhaMntYB6ftcPKqAcTEmqoV6MHhz5R0s\",\"audience\":\"https://".config('laravel-auth0.domain')."/api/v2/\",\"grant_type\":\"client_credentials\"}",
//   CURLOPT_HTTPHEADER => array(
//     "content-type: application/json"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);
//     $response=json_decode($response);


//     $Url = 'https://'.config('laravel-auth0.domain').'/api/v2/users';
//     // echo "<pre>";
//     // print_r($Url);
//     // die();
//       $curl = curl_init();
//       curl_setopt_array($curl, array(
//       CURLOPT_URL => $Url,
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 30,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => "POST",
//       CURLOPT_POSTFIELDS => "{\"email\": \"".$input['email']."\",\"password\": \"".$input['password']."\",\"name\": \"".$input['username']."\",\"connection\": \"Username-Password-Authentication\"}",
//       CURLOPT_HTTPHEADER => array(
//         "content-type: application/json",        
//         "authorization:  Bearer ".$response->access_token
//       ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);
//     // echo "<pre>";
//     // print_r($response);
//     // die();






          $to = $request->email;
	        $subject = 'Verify your email address.';
	        $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('register/verify/'.$token).">Simply click here to verify. </a>";
	        //Sending Email To Customer
	        if($gs->is_smtp == 1)
	        {
  	        $data = [
  	            'to' => $to,
  	            'subject' => $subject,
  	            'body' => $msg,
  	        ];

  	        $mailer = new GeniusMailer();
  	        $mailer->sendCustomMail($data);
	        }
	        else
	        {
            $headers = "From: $gs->title <$gs->from_email> \r\n";
      			$headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
      			$headers .= "MIME-Version: 1.0\r\n";
      			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  	        mail($to,$subject,$msg,$headers);
	        }
        	return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
    }

    public function token($token)
    {
        $user = User::where('verification_link','=',$token)->first();
        if(isset($user))
        {
            $user->email_verified = 1;
            $user->update();
            Auth::login($user);
            return redirect()->route('user-dashboard')->with('success','Email Verified Successfully');
        }
    }
}
