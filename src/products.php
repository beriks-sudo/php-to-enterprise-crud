
<?php

function productsStoragePath(): string {
    return __DIR__ . '/../storage/products.json';
}

function ensureProductsStorageExists(string $path): void {
    if (file_exists($path)) {
        return;
    }
    $writtenBytes = file_put_contents($path, "[]\n", LOCK_EX);
    if ($writtenBytes === false) {
        throw new RuntimeException('Cannot create products storage');
    }
}

function loadProducts(string $path): array {
    ensureProductsStorageExists($path);
    $json = file_get_contents($path);
    if ($json === false) {
        throw new RuntimeException('Cannot read products storage');
    }

    try {
        $products = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $exception) {
          throw new RuntimeException(
              'Invalid products JSON: '
              . $exception->getMessage()
          );
      }

      if (!is_array($products)) {
          throw new RuntimeException(
              'Products storage must contain JSON array'
          );
      }

      return $products;


}
function saveProducts(string $path, array $products): void  {
    $json = json_encode(
        $products,
        JSON_PRETTY_PRINT
        | JSON_UNESCAPED_UNICODE
        | JSON_THROW_ON_ERROR
    );

    $writtenBytes = file_put_contents(
        $path,
        $json . "\n",
        LOCK_EX
    );

    if ($writtenBytes === false) {
        throw new RuntimeException(
            'Cannot write products storage'
        );
    }
}

function getNextProductId(array $products): int {
    $maxId = 0;
    foreach ($products as $product) {
        if (($product['id'] ?? 0) > $maxId) {
            $maxId = $product['id'];
        }
    }
    return $maxId + 1;
}

function findProductById(array $products, int $id): ?array {
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

function validateProductPayload(array $payload): array {
    $errors = [];
    $name = trim($payload['name'] ?? '');
    $price = (int) ($payload['price'] ?? 0);
    if ($name === '') {
        $errors['name'] = 'Name is required';
    }
    if ($price <= 0) {
        $errors['price'] = 'Price must be greater than 0';
    }
    return $errors;

}

function createProduct(array $products, array $payload): array {
    $product = [
        'id' => getNextProductId($products),
        'name' => trim( (string) ($payload['name'] ?? '')),
        'price' => (int) ($payload['price'] ?? 0),
        'is_active' => (bool) ($payload['is_active'] ?? true)
    ];
    $products[] = $product;
    return [$products, $product];
}

function updateProduct(array $products, int $id, array $payload): array {
    foreach ($products as $index => $product) {
        if (($product['id'] ?? null) !== $id) {
            continue;
        }

        $products[$index]['name'] = trim(
            (string) (
                $payload['name']
                ?? $product['name']
            )
        );

        $products[$index]['price'] = (int) (
            $payload['price']
            ?? $product['price']
        );

        $products[$index]['is_active'] = (bool) (
            $payload['is_active']
            ?? $product['is_active']
        );

        break;
    }

    return $products;
}


function deleteProduct(array $products, int $id): array {
        foreach ($products as $index => $product) {
            if (($product['id'] ?? null) === $id) {
                unset($products[$index]);
                break;
            }
        }
        return array_values($products);
}





