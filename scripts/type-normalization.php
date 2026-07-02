<?php

$rawName = "Monitor";
$rawPrice = "45000";
$rawIsActive = "1";

$name = trim($rawName);
$price = (int) $rawPrice;
$isActive = (bool) $rawIsActive;

var_dump($name);
var_dump($price);
var_dump($isActive);

//Преобразуй их:
//
//$name как строка без лишних пробелов;
//$price как integer;
//$isActive как boolean.
//Выведи каждое значение через var_dump. Добавь проверки: имя не пустое, цена больше нуля.

