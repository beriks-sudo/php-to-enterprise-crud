<?php

$prices = [12000, 7500, 45000, 0, -100];
//
//Нужно:
//
//вывести только валидные цены больше нуля;
//посчитать сумму валидных цен;
//посчитать количество невалидных цен;
//остановить цикл, если встретилась цена больше 100000.
//В конце выведи отчет в несколько строк.
$sumValid = 0;
$invalidCount = 0;
foreach ($prices as $price) {

    if ($price > 100000) {
        break;
    } elseif ($price > 0) {
        echo "Price: " . $price . "\n";
        $sumValid += $price;
    } else {
        $invalidCount += 1;
        continue;
    }
}
echo "SumValid: " . $sumValid . "\n";
echo "InvalidCount: " . $invalidCount . "\n";