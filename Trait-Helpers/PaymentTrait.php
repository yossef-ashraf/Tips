<?php

//base https://github.com/Nafezly/payments

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Nafezly\Payments\Classes\PaymobPayment;
use Nafezly\Payments\Factories\PaymentFactory ;

trait PaymentTrait{


public function FactoryPayment(string $Name)
{
    // $paymentName =$paymentName ;
    $payment = new PaymentFactory();
    $payment=$payment->get($Name)->pay(
    $amount = null,
    $user_id = null,
    $user_first_name = null,
    $user_last_name = null,
    $user_email = null,
    $user_phone = null,
    $source = null
    );

}

public function Verify(string $name , $request)
{
    $className = 'Nafezly\Payments\Classes\\' . $name . 'Payment';
    if (class_exists($className))
        $Verify= new $className();


    $Verify->verify($request);
    if ($Verify['success'] == 'success' ) {
        return \Redirect::away('');
    }else {
        return \Redirect::away('');
    }
}

public function PaymobPayment($id,$first_name,$last_name,$email,$phone,$currency,$amount){

    $payment = new PaymobPayment();
        $payment->setUserId($id)
        ->setUserFirstName($first_name)
        ->setUserLastName($last_name)
        ->setUserEmail($email)
        ->setUserPhone($phone)
        ->setCurrency($currency)
        ->setAmount($amount)
        ->pay();
    return $payment;
}

public function PaymobPaymentVerify($request)
{
    $payment = new PaymobPayment();
    $payment = $payment->verify($request);
    if ($payment['success'] == 'success' ) {
        return \Redirect::away('');
    }else {
        return \Redirect::away('');
    }
}

public function PaymobPaymentRefund($transaction_id,$amount)
{
    $payment = new PaymobPayment();
    $payment = $payment->refund($transaction_id,$amount);
    if ($payment['success'] == 'success') {
        return \Redirect::away('');
    } else {
        return \Redirect::away('');
    }

}


}





