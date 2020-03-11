<?php

const HOUR = 60;
const PRICE_GPS = 15;

trait Gps
{
    public function setPriceGps()
    {
        return ceil($this->time / HOUR) * PRICE_GPS;
    }
}