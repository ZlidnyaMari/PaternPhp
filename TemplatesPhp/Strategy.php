<?php
$basket = [
    [
        'название' => 'носки мужские',
        'колличество' => '1',
        'цена' => '30',
    ],
    [
        'название' => 'носки женские',
        'колличество' => '2',
        'цена' => '30',
    ]
];



interface PaymentSystem
{
    public function pay($namePay): string;
}

class PayQiwi implements PaymentSystem
{
    public function pay($namePay): string
    {
        return "Оплата через $namePay \n";
    } 
}

class PayYandex implements PaymentSystem
{
    public function pay($namePay): string
    {
        return "Оплата через $namePay \n";
    } 
}

class PayWebMoney implements PaymentSystem
{
    public function pay($namePay): string
    {
        return "Оплата через $namePay \n";
    } 
}

class StrategyPay 
{
    protected $strategy;

    public function __construct(PaymentSystem $strategy)
    {
        $this->strategy = $strategy;
    }

    public function execute($namePay)
    {
        return $this->strategy->pay($namePay);
    }
}


class Payment 
{
    private array $basket;
    private StrategyPay $strategy;
    public string $namePay;

    public function __construct(array $basket, StrategyPay $strategy, string $namePay)
    {
        $this->basket = $basket;
        $this->strategy = $strategy;
        $this->namePay = $namePay;
    }

    public function getBasket()
    {
        return $this->basket;
    }

    public function getStrategyPay()
    {
        $this->strategy;
    }

    public function getBasketValue()
    {
        $rezult = 0;

        foreach($this->basket as $key => $value){
            $summ = $value['колличество'] * $value['цена'];
            $rezult += $summ;
            }
        return "Сумма вашего заказа $rezult рублей";    
    }

    public function сhoiceOfStrategy()
    {
        return $this->strategy->execute($this->namePay);
    }

}



$payment = new Payment($basket, new StrategyPay(new PayYandex), 'yandex');
echo $payment->сhoiceOfStrategy();
echo $payment->getBasketValue();

