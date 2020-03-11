<?php

require_once './traits/tDriver.php';

class Daily extends Rent
{
    public $priceTime = 1000; //24h
    public $priceDistance = 1;

    use Driver;

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

        if ($driver) {
            self::$total += $this->setDriver();
        }
    }

    public function totalPrice()
    {
        return ceil($this->time / 60 / 24) * $this->priceTime + $this->distance * $this->priceDistance;
    }

}