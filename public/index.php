<?php

declare(strict_types=1);

header('Content-Type: application/json');

//echo json_encode([
//    'method' => $_SERVER['REQUEST_METHOD'] ?? null,
//    'uri' => $_SERVER['REQUEST_URI'] ?? null,
//    'query' => $_GET,
//], JSON_PRETTY_PRINT);


echo json_encode([
    "runtime" => "php",
    "mode" => "web",
    "method" => "GET"
], JSON_PRETTY_PRINT);
