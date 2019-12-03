<?php

namespace App\Http\Controllers;
use App\Payment;
use Illuminate\Http\Request;
use Instamojo\Instamojo;
class HomeController extends Controller
{
    public function index()
   {
        return view('payment.index', [
            'title' => 'All payments',
            'payments' => Payment::all(),
        ]);
   }




    /**
     * Handle contact form
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->check($request);
        $this->add($request);
        $this->initApi();
        return $this->redirectToPaymentGateway();

    }

    /**
     * Validate incoming form data
     *
     * @param Request $request
     * @return void
     */
    private function check(Request $request)
    {
        $rules = [
            'name' => 'required',

        ];
        $request->validate($rules);
    }

    private function add(Request $request)
    {
       $this->payment = Payment::create([
           'name' => $request->name,
           'mobilenumber' => $request->mobilenumber,
           'emailid' => $request->emailid,
           'fee' => $request->fee,

       ]);
    }


   public function pay(Request $request){

     $api = new \Instamojo\Instamojo(
            config('services.instamojo.api_key'),
            config('services.instamojo.auth_token'),
            config('services.instamojo.url')
        );

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "Donation",
            "fee" => $request->fee,
            "buyer_name" => "$request->name",
            "send_email" => true,
            "emailid" => "$request->emailid",
            "mobilenumber" => "$request->mobilenumber",
            "redirect_url" => "http://127.0.0.1:8000/pay-success"
            ));
            dd($response);
            header('Location: ' . $response['longurl']);
            exit();
    }       catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
 }

 public function success(Request $request){
     try {

        $api = new \Instamojo\Instamojo(
            config('services.instamojo.api_key'),
            config('services.instamojo.auth_token'),
            config('services.instamojo.url')
        );

        $response = $api->paymentRequestStatus(request('payment_request_id'));

        if( !isset($response['payments'][0]['status']) ) {
           dd('payment failed');
        } else if($response['payments'][0]['status'] != 'Credit') {
             dd('payment failed');
        }
      }catch (\Exception $e) {
         dd('payment failed');
     }
    dd($response);
  }


}
