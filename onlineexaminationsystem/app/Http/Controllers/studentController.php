<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use Mail;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class studentController extends Controller
{
    public function paidExam(){
        $exams = Exam::where('plan',1)->with('subjects')->orderBy('date','DESC')->get();

        return view('student.paid_exam',['exams'=>$exams]);
        
    }


    public function Mpesapay(Request $request)
    {
        $consumerKey = 'qlmgrxQ65aK2GJ9AqXtYW6EOFfGpn1MfPwKu0IlUSQtelM5d';
        $consumerSecret = '1AhL9GA4i1sYlHo4xB26RMePFw3I4GiJClAGW2JEycfvY0J1jV3LhudTrl9J46Vs';
    
        $authUrl = "https://sandbox.safaricom.co.ke/oauth/v1/generate";
    
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($consumerKey . ':' . $consumerSecret),
            'Content-Type' => 'application/json',
        ])->get($authUrl, [
            'grant_type' => 'client_credentials',
        ]);

        $response_body = $response->getBody()->getContents();
    
        
        
        if ($response->failed()) {
            return [
                'success' => false,
                'message' => 'Error: ' . $response->body(),
            ];
        }
    
        $authResponseData = $response->json();
        $access_token = $authResponseData['access_token'];
    print_r($access_token);
    exit();

    
    
 
    }
    

    
}