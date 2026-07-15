
<!--не используй global: все нужные значения передавай параметрами.-->
<!--Проверь:-->
<!---->
<!--php -l scripts/product-operator-lab.php-->
<!--php scripts/product-operator-lab.php-->

<?php

$payload = [
    'name' => "Keyboard",
    'price' => 12000,
    'quantity' => 5,
    'status' => 'active',
];

$name = $payload['name'] ?? '';
$price = $payload['price'] ?? 0;
$quantity = $payload['quantity'] ?? 0;
$status = $payload['status'] ?? 'unknown';

$name = trim($name) ?: 'Unnamed product';

$lineTotal = $quantity * $price;

$total = 0;
$total += $lineTotal;

$textTotal = "";
$textTotal .= "Product: " . $name . "\n";
$textTotal .= "Status: " . $status . "\n";
$textTotal .= "Price: " . $price . "\n";
$textTotal .= "Quantity: " . $quantity . "\n";
$textTotal .= "Line total: " . $lineTotal . "\n";

switch ($status) {
    case 'active':
        echo "Product is visible\n";
        break;

    case 'draft':
        echo "Product is hidden\n";
        break;

    default:
        echo "Unknown status\n";
}

$statusLabel = match ($status) {
    'active' => 'Visible',
    'draft' => 'Draft',
    'archived' => 'Archived',
    default => 'Unknown',
};


function calculateLineTotal(int $price, int $quantity): int {
    return $price * $quantity;
}

function normalizeOptionalName(?string $name): ?string {
    return trim($name) ?: 'Unnamed product';
}


function formatProductId(int|string $id): string {
    return (string) $id;
}

function debugValue(mixed $value): void {
    var_dump($value);
}

function failValidation(string $message): never {
    throw new RuntimeException($message);
}

