<?php


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
            trigger_error('Ваш возраст не подходит', E_USER_NOTICE);
        }
    }
}