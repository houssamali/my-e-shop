<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
class PaypmentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway=Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(TRUE);
    }

    public function pay(Request $request)
    {
        try {
            $response=$this->gateway->purchase(array(
                'amount'=>$request->amount,
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>url('success'),
                'cancelUrl'=>url('error')
            ))->Send();
            if($response->isRedirect())
            {
                $response->redirect();
            }else{
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
