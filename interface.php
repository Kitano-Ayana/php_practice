<?php

interface PaymentInterface {
    public function payNow();
}

interface LoginInterface {
    public function loginFirst();
}

//class Paypal implements PaymentInterface, LoginInterface {
//    public function paymentProcess(){
//        $this->loginFirst();
//        $this->payNow();
//    }
//}

class Visa implements PaymentInterface {
    public function payNow()
    {

    }

    public function paymentProcess()
    {
        $this->loginFirst();
        $this->payNow();
    }
}

class Cash implements PaymentInterface {
    public function payNow()
    {

    }

    public function paymentProcess()
    {
        $this->payNow();
    }
}

class BuyProduct {
    public function pay(PaymentInterface $paymentType){
        $paymentType->paymentProcess();
    }

    public function onlinePay(LoginInterface $paymentType){
        $paymentType->paymentProcess();
    }
}

//Cashクラスのインスタンス化
$paymentType = new Cash();

//BuyProductクラスのインスタンス化
$buyProduct = new BuyProduct();

//Cashクラスのインスタンス化を引数に、pay関数を実行→CashクラスのpaymentProcess関数が実行
$buyProduct->pay($paymentType);

//test


