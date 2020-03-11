<?php

require_once './traits/tDriver.php';

class Hourly extends Rent
{
    public $priceTime = 200; //60min
    public $priceDistance = 0;

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

    public function yangAge($years)
    {
        if ($years > 17 && $years < 22) {
            $this->priceTime += $this->priceTime / 100 * 10;
        }
    }

    public function totalPrice()
    {
        return ceil($this->time / 60) * $this->priceTime;
    }
}