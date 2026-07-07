
проверь email, URL и price через filter_var;
для невалидных значений выведи понятные сообщения.

<?php

$timezone = new DateTimeZone('Asia/Almaty');
$createdAt = new DateTimeImmutable('now', $timezone);
$publishedAt = $createdAt->modify('+7 days');
echo $createdAt->format(DateTimeInterface::ATOM) . "\n";
echo $publishedAt->format(DateTimeInterface::ATOM) . "\n";

$names = ["Keyboard", "Чайник", "Қалам"];
foreach ($names as $name) {
    echo strlen($name) . "\n";
    if (mb_strlen($name, 'UTF-8') < 3) {
        echo "Name is too short\n";}
    if (mb_strlen($name, 'UTF-8') > 80) {
        echo "Name is too big\n";}
    echo mb_strlen($name, 'UTF-8') . "\n";
}

$rawEmail = 'manager@example.com';
$rawUrl = 'https://example.com/products/1';
$rawPrice = '12000';

$email = filter_var($rawEmail, FILTER_VALIDATE_EMAIL);
$url = filter_var($rawUrl, FILTER_VALIDATE_URL);
$price = filter_var($rawPrice, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1],
]);

if ($email === false) {
    echo "Invalid email\n";
}

if ($url === false) {
    echo "Invalid URL\n";
}

if ($price === false) {
    echo "Invalid price\n";
}