<?php
$productName = "Keyboard";
$price = 12000;
$currency = "KZT";
?>

<DOCTYPE html>
 <html>
 <body>
 <h1><?= htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') ?></h1>
 <p>
     <?= htmlspecialchars($price, ENT_QUOTES, 'UTF-8') ?>
     <?= htmlspecialchars($currency, ENT_QUOTES, 'UTF-8') ?>
 </p>
 </body>

 </html>