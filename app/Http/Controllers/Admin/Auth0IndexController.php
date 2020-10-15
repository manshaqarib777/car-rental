<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CustomUserRepository;
use Illuminate\Http\Request;
use  App\Models\Admin;
use  App\Models\User;
use Auth;
use URL;
// app/Http/Controllers/Auth/Auth0IndexController.php
// ...
class Auth0IndexController extends Controller
{
  public function __construct()
    {
        session_start();
    }
    public function index()
    {
      $service = \App::make('auth0');
      $profile = $service->getUser();       
      if (!empty($profile)) {
        if ($_SESSION['check_auth'] =='admin') {
          
          $credentials['email'] = $profile['profile']['email'] ;
          $credentials['password'] = 'secret';
          // echo "<pre>";
          // print_r($profile);
          // die();
          if ($profile['profile']['email_verified']!=1) {
            $notification = array(
                'message' => 'Please verify your email first !',
                'alert-type' => 'error'
            );

            Auth::guard('admin')->logout();
            $logoutUrl = sprintf(
              'https://%s/v2/logout?client_id=%s&returnTo=%s',
              config('laravel-auth0.domain'),
              config('laravel-auth0.client_id'),
              url('/')
          );
          return  \Redirect::intended($logoutUrl)->with($notification);
          }
          else if (Auth::guard('admin')->attempt($credentials)) {
              // Authentication passed...
              return redirect()->intended('admin/');
          }
          else
          {
            $notification = array(
                'message' => 'Guest Login is not Allowed !',
                'alert-type' => 'error'
            );

            Auth::guard('admin')->logout();
            $logoutUrl = sprintf(
              'https://%s/v2/logout?client_id=%s&returnTo=%s',
              config('laravel-auth0.domain'),
              config('laravel-auth0.client_id'),
              url('/')
          );
          return  \Redirect::intended($logoutUrl)->with($notification);
          }  
        }
        else
        {
          $user = User::where( 'email', $profile['profile']['email'] )->first();
          if ( empty($user)  ) {
            $user = new User();
            $user->type = 1;
            $user->first_name = $profile['profile']['nickname'];
            $user->last_name = $profile['profile']['nickname'];
            $user->username = $profile['profile']['nickname'];
            $user->email = $profile['profile']['email'];
            $user->password = bcrypt('secret');
            $user->email_verified = $profile['profile']['email_verified'];
            $user->save();
          }
          $user['password'] = 'secret';

          $credentials = $user->only('email','password');
          // echo "<pre>";
          // print_r($credentials);
          // die();
          if ($profile['profile']['email_verified']!=1) {
            $notification = array(
                'message' => 'Please verify your email first !',
                'alert-type' => 'error'
            );
            Auth::guard('web')->logout();
            $logoutUrl = sprintf(
              'https://%s/v2/logout?client_id=%s&returnTo=%s',
              config('laravel-auth0.domain'),
              config('laravel-auth0.client_id'),
              url('/register')
          );
          return  \Redirect::intended($logoutUrl)->with($notification);
          }
          else if (Auth::guard('web')->attempt($credentials)) {
              
              // Authentication passed...
              return redirect()->intended('/dashboard');
          }
          else
          {
            
            Auth::guard('web')->logout();
            $logoutUrl = sprintf(
              'https://%s/v2/logout?client_id=%s&returnTo=%s',
              config('laravel-auth0.domain'),
              config('laravel-auth0.client_id'),
              url('/')
          );
          return  \Redirect::intended($logoutUrl);
          }
        }
      }
      else
      {
        $url=URL::current();
        if (strpos($url, 'admin') !== false) {
          return redirect()->intended('admin/login');
        }
        else
        {
          return redirect()->intended('login'); 
        }  
      }
    }
    public function login(Request $request)
    {
      $url=URL::current();
      if (strpos($url, 'admin') !== false) {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }
        $_SESSION['check_auth']='admin';
      }
      else {
        if (Auth::guard('web')->check()) {
            return redirect('/dashboard');
        }
        $_SESSION['check_auth']='user';
      }
      $service = \App::make('auth0');
      $profile = $service->getUser();       
      // echo "<pre>";
      // print_r($profile);
      // die();
      if (!empty($profile)) 
      {
        return redirect()->intended('/check');
      }
      else
      {
        $authorize_params = [
            'scope' => 'openid profile email',
            // Use the key below to get an access token for your API.
            // 'audience' => config('laravel-auth0.api_identifier'),
        ];
        return \App::make('auth0')->login(null, null, $authorize_params);
      }
    }

    /**
     * Log out of Auth0
     *
     * @return mixed
     */
    public function logout()
    {
      $url=URL::current();
      if (strpos($url, 'admin') !== false) {
        Auth::guard('admin')->logout();
        $logoutUrl = sprintf(
            'https://%s/v2/logout?client_id=%s&returnTo=%s',
            config('laravel-auth0.domain'),
            config('laravel-auth0.client_id'),
            url('/')
        );
        return  \Redirect::intended($logoutUrl);
      }
      else
      {
        Auth::guard('web')->logout();
        $logoutUrl = sprintf(
            'https://%s/v2/logout?client_id=%s&returnTo=%s',
            config('laravel-auth0.domain'),
            config('laravel-auth0.client_id'),
            url('/')
        );
        return  \Redirect::intended($logoutUrl); 
      }
    }
    public function dump()
  {
    $isLoggedIn = \Auth::check();
    return view('dump')
      ->with('isLoggedIn', $isLoggedIn)
      ->with('user',\Auth::user()->getUserInfo())
      ->with('accessToken',\Auth::user()->getAuthPassword());
  }
  public function updatepassword()
  {
    $service = \App::make('auth0');
    $isLoggedIn = $service->getUser();
    // $isLoggedIn['profile']['sub']=explode('|', $isLoggedIn['profile']['sub']);
    // $isLoggedIn['profile']['sub']=$isLoggedIn['profile']['sub'][1];
    // echo "<pre>";
    // print_r($isLoggedIn);
    // die();
    $Url = sprintf(
        'https://%s/api/v2/users/%s',
        config('laravel-auth0.domain'),
        $isLoggedIn['profile']['sub']
    );
    // echo "<pre>";
    // print_r($Url);
    // die();
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => $Url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "PATCH",
      CURLOPT_POSTFIELDS => "{\"email\": \"abc@gmil.com\"}",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",        
        "authorization:  Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik5ERkJRVFEzUWprd01ETXpRVVExTXpjNE1FRkRSakF6TVVWQ05FVkNNVUZCUmtORlJqQkJOZyJ9.eyJpc3MiOiJodHRwczovL21hbnNoYTc3Ny5hdXRoMC5jb20vIiwic3ViIjoiT0lpZzh3a1N5UU5Hb1paa0Y4ZHNia1lWd1RpbE5kNGRAY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vbWFuc2hhNzc3LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTY4OTMzNDc3LCJleHAiOjE1NjkwMTk4NzcsImF6cCI6Ik9JaWc4d2tTeVFOR29aWmtGOGRzYmtZVndUaWxOZDRkIiwic2NvcGUiOiJyZWFkOmNsaWVudF9ncmFudHMgY3JlYXRlOmNsaWVudF9ncmFudHMgZGVsZXRlOmNsaWVudF9ncmFudHMgdXBkYXRlOmNsaWVudF9ncmFudHMgcmVhZDp1c2VycyB1cGRhdGU6dXNlcnMgZGVsZXRlOnVzZXJzIGNyZWF0ZTp1c2VycyByZWFkOnVzZXJzX2FwcF9tZXRhZGF0YSB1cGRhdGU6dXNlcnNfYXBwX21ldGFkYXRhIGRlbGV0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBjcmVhdGU6dXNlcl90aWNrZXRzIHJlYWQ6Y2xpZW50cyB1cGRhdGU6Y2xpZW50cyBkZWxldGU6Y2xpZW50cyBjcmVhdGU6Y2xpZW50cyByZWFkOmNsaWVudF9rZXlzIHVwZGF0ZTpjbGllbnRfa2V5cyBkZWxldGU6Y2xpZW50X2tleXMgY3JlYXRlOmNsaWVudF9rZXlzIHJlYWQ6Y29ubmVjdGlvbnMgdXBkYXRlOmNvbm5lY3Rpb25zIGRlbGV0ZTpjb25uZWN0aW9ucyBjcmVhdGU6Y29ubmVjdGlvbnMgcmVhZDpyZXNvdXJjZV9zZXJ2ZXJzIHVwZGF0ZTpyZXNvdXJjZV9zZXJ2ZXJzIGRlbGV0ZTpyZXNvdXJjZV9zZXJ2ZXJzIGNyZWF0ZTpyZXNvdXJjZV9zZXJ2ZXJzIHJlYWQ6ZGV2aWNlX2NyZWRlbnRpYWxzIHVwZGF0ZTpkZXZpY2VfY3JlZGVudGlhbHMgZGVsZXRlOmRldmljZV9jcmVkZW50aWFscyBjcmVhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIHJlYWQ6cnVsZXMgdXBkYXRlOnJ1bGVzIGRlbGV0ZTpydWxlcyBjcmVhdGU6cnVsZXMgcmVhZDpydWxlc19jb25maWdzIHVwZGF0ZTpydWxlc19jb25maWdzIGRlbGV0ZTpydWxlc19jb25maWdzIHJlYWQ6ZW1haWxfcHJvdmlkZXIgdXBkYXRlOmVtYWlsX3Byb3ZpZGVyIGRlbGV0ZTplbWFpbF9wcm92aWRlciBjcmVhdGU6ZW1haWxfcHJvdmlkZXIgYmxhY2tsaXN0OnRva2VucyByZWFkOnN0YXRzIHJlYWQ6dGVuYW50X3NldHRpbmdzIHVwZGF0ZTp0ZW5hbnRfc2V0dGluZ3MgcmVhZDpsb2dzIHJlYWQ6c2hpZWxkcyBjcmVhdGU6c2hpZWxkcyBkZWxldGU6c2hpZWxkcyByZWFkOmFub21hbHlfYmxvY2tzIGRlbGV0ZTphbm9tYWx5X2Jsb2NrcyB1cGRhdGU6dHJpZ2dlcnMgcmVhZDp0cmlnZ2VycyByZWFkOmdyYW50cyBkZWxldGU6Z3JhbnRzIHJlYWQ6Z3VhcmRpYW5fZmFjdG9ycyB1cGRhdGU6Z3VhcmRpYW5fZmFjdG9ycyByZWFkOmd1YXJkaWFuX2Vucm9sbG1lbnRzIGRlbGV0ZTpndWFyZGlhbl9lbnJvbGxtZW50cyBjcmVhdGU6Z3VhcmRpYW5fZW5yb2xsbWVudF90aWNrZXRzIHJlYWQ6dXNlcl9pZHBfdG9rZW5zIGNyZWF0ZTpwYXNzd29yZHNfY2hlY2tpbmdfam9iIGRlbGV0ZTpwYXNzd29yZHNfY2hlY2tpbmdfam9iIHJlYWQ6Y3VzdG9tX2RvbWFpbnMgZGVsZXRlOmN1c3RvbV9kb21haW5zIGNyZWF0ZTpjdXN0b21fZG9tYWlucyByZWFkOmVtYWlsX3RlbXBsYXRlcyBjcmVhdGU6ZW1haWxfdGVtcGxhdGVzIHVwZGF0ZTplbWFpbF90ZW1wbGF0ZXMgcmVhZDptZmFfcG9saWNpZXMgdXBkYXRlOm1mYV9wb2xpY2llcyByZWFkOnJvbGVzIGNyZWF0ZTpyb2xlcyBkZWxldGU6cm9sZXMgdXBkYXRlOnJvbGVzIHJlYWQ6cHJvbXB0cyB1cGRhdGU6cHJvbXB0cyByZWFkOmJyYW5kaW5nIHVwZGF0ZTpicmFuZGluZyIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.Oj_pIz9Rmt9W52euxpxkVdud9-nu8s23NTcV2RLveTNOPIoUaURHILv2F1VKb0PMefHSkgJ5iwU7pCKs26Su5Iu9cJsRvCjhf1vwfxhc9G48hnLD3PbBx5MBUqQtKGdTP8MpORd7h3GhihYDJ8YN05VfgtPQMfNxSwJNIhLA6XHwXG16h7ktdID6j9rUmG_PtGVEDGM86ENZ6CevaAmkKwO4VZXwXnEMLlsVaOZeygR0LDkv_eCpLmSaPwZINCG-rzp9-aOfeOVLSrDiuiRTHJ8BiGTwkDMEw7cErK4ELwo1F1hfGloq8bTiteBLvlYGa5QYORAAQgIP6cU51BAtXQ"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }
}
