<?php

require_once './traits/tGps.php';
require_once './interfaces/iRent.php';

abstract class Rent implements iRentCar
{
    public $priceTime = 3;
    public $priceDistance = 10;
    public $time;
    public $distance;
    public $age;
    static $total;

    use Gps;

    public function __construct($distance, $time, $age, $gps = false, $driver = false)
    {
        $this->time = $time;
        $this->distance = $distance;
        $this->checkAge($age);

        if ($gps) {
            self::$total = $this->totalPrice() + $this->setPriceGps();
        } else {
            self::$total = $this->totalPrice();
        }
    }

    public function yangAge($years)
    {
        if ($years > 17 && $years < 22) {
            $this->priceDistance += $this->priceDistance / 100 * 10;
            $this->priceTime += $this->priceTime / 100 * 10;
        }
    }

    public function checkAge($years)
    {
        if ($years > 17 && $years < 66) {
            $this->yangAge($years);
            $this->age = $years;
        } else {
            trigger_error('Ваш возраст не подходит', E_USER_NOTICE);
        }
    }

    public function totalPrice()
    {
        return $this->time * $this->priceTime + $this->distance * $this->priceDistance;
    }
}