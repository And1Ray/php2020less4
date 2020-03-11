<?php

require_once 'classes/Base.php';
require_once 'classes/Hourly.php';
require_once 'classes/Daily.php';
require_once 'classes/Student.php';


$baseYang = new Base(10, 5, 20);
echo $baseYang::$total;
echo '<br>';

$base = new Base(10, 5, 25);
echo $base::$total;
echo '<br>';

$baseOld = new Base(22, 53, 28);
echo $baseOld::$total;
echo '<br>';
$baseGps = new Base(10, 5, 20, true);
echo $baseGps::$total;
echo '<br>';

echo '<hr>';

$hourlyYang = new Hourly(10, 5, 20);
echo $hourlyYang::$total;
echo '<br>';

$hourly = new Hourly(10, 535, 25);
echo $hourly::$total;
echo '<br>';

$hourlyOld = new Hourly(10, 5, 61, false, true);
echo $hourlyOld::$total;
echo '<br>';

$hourlyGps = new Hourly(10, 120, 20, true);
echo $hourlyGps::$total;
echo '<br>';

echo '<hr>';

$daylyYang = new Daily(59, 59, 20);
echo $daylyYang::$total;
echo '<br>';

$dayly = new Daily(100, 3840, 25);
echo $dayly::$total;
echo '<br>';

$daylyOld = new Daily(10, 5, 77);
echo $daylyOld::$total;
echo '<br>';

$daylyGps = new Daily(10, 2880, 20, true);
echo $daylyGps::$total;
echo '<br>';

echo '<hr>';

$studentYang = new Student(59, 59, 20);
echo $studentYang::$total;
echo '<br>';

$student = new Student(100, 3840, 25);
echo $student::$total;
echo '<br>';

$studentOld = new Student(10, 5, 77);
echo $studentOld::$total;
echo '<br>';

$studentGps = new Student(10, 2880, 20, true);
echo $studentGps::$total;
echo '<br>';


echo '<hr>';




