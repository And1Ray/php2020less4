<?php


trait Gps
{
    public function setPriceGps()
    {
        return ceil($this->time / 60) * 15;
    }
}

trait Driver
{
    public function setDriver()
    {
        return 100;
    }
}

interface iRentCar
{
    public function __construct($distance, $time, $age);

    public function totalPrice();

    public function checkAge($years);
}

abstract class Rent implements iRentCar
{
    public $priceTime = 3;
    public $priceDistance = 10;
    public $time;
    public $distance;
    public $age;
    public $total;

    use Gps;

    public function __construct($distance, $time, $age, $gps = false, $driver = false)
    {
        $this->time = $time;
        $this->distance = $distance;
        $this->checkAge($age);

        if ($gps) {
            $this->total = $this->totalPrice() + $this->setPriceGps();
        } else {
            $this->total = $this->totalPrice();
        }

        echo $this->total;
        echo '<br>';
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
            $this->age = false;
        }
    }

    public function totalPrice()
    {
        if ($this->age) {
            return $this->total = $this->time * $this->priceTime + $this->distance * $this->priceDistance;
        } else {
            echo 'Ваш возраст не подходит';
        }
    }
}

class Base extends Rent
{

}

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
            $this->total = $this->totalPrice() + $this->setPriceGps();
        } else {
            $this->total = $this->totalPrice();
        }

        if ($driver) {
            $this->total += $this->setDriver();
        }

        echo $this->total;
        echo '<br>';
    }

    public function yangAge($years)
    {
        if ($years > 17 && $years < 22) {
            $this->priceTime += $this->priceTime / 100 * 10;
        }
    }

    public function totalPrice()
    {
        if ($this->age) {
            return $this->total = ceil($this->time / 60) * $this->priceTime;
        } else {
            echo 'Ваш возраст не подходит';
        }
    }
}

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
            $this->total = $this->totalPrice() + $this->setPriceGps();
        } else {
            $this->total = $this->totalPrice();
        }

        if ($driver) {
            $this->total += $this->setDriver();
        }

        echo $this->total;
        echo '<br>';
    }

    public function totalPrice()
    {
        if ($this->age) {
            return $this->total = ceil($this->time / 60 / 24) * $this->priceTime + $this->distance * $this->priceDistance;
        } else {
            echo 'Ваш возраст не подходит';
        }
    }

}

class Student extends Rent
{
    public $priceTime = 1;
    public $priceDistance = 4;

    public function checkAge($years)
    {
        if ($years > 17 && $years < 26) {
            $this->yangAge($years);
            $this->age = $years;
        } else {
            $this->age = false;
        }
    }
}


$baseYang = new Base(10, 5, 20);
print_r($baseYang);
echo '<br>';
echo '<br>';
$base = new Base(10, 5, 25);
print_r($base);
echo '<br>';
echo '<br>';
$baseOld = new Base(10, 5, 77);
print_r($baseOld);
echo '<br>';
echo '<br>';
$baseGps = new Base(10, 5, 20, true);
print_r($baseGps);
echo '<br>';
echo '<br>';

echo '<hr>';

$hourlyYang = new Hourly(10, 5, 20);
print_r($hourlyYang);
echo '<br>';
echo '<br>';
$hourly = new Hourly(10, 535, 25);
print_r($hourly);
echo '<br>';
echo '<br>';
$hourlyOld = new Hourly(10, 5, 61, false, true);
print_r($hourlyOld);
echo '<br>';
echo '<br>';
$hourlyGps = new Hourly(10, 120, 20, true);
print_r($hourlyGps);
echo '<br>';
echo '<br>';

echo '<hr>';

$daylyYang = new Daily(59, 59, 20);
print_r($daylyYang);
echo '<br>';
echo '<br>';
$dayly = new Daily(100, 3840, 25);
print_r($dayly);
echo '<br>';
echo '<br>';
$daylyOld = new Daily(10, 5, 77);
print_r($daylyOld);
echo '<br>';
echo '<br>';
$daylyGps = new Daily(10, 2880, 20, true);
print_r($daylyGps);
echo '<br>';
echo '<br>';

echo '<hr>';

$studentYang = new Daily(59, 59, 20);
print_r($studentYang);
echo '<br>';
echo '<br>';
$student = new Daily(100, 3840, 25);
print_r($student);
echo '<br>';
echo '<br>';
$studentOld = new Daily(10, 5, 77);
print_r($studentOld);
echo '<br>';
echo '<br>';
$studentGps = new Daily(10, 2880, 20, true);
print_r($studentGps);
echo '<br>';
echo '<br>';

echo '<hr>';




