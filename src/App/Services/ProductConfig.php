<?php

namespace Main\App\Services;

use InvalidArgumentException;

/**
 * Service responsible for fetching the product config file.
 */
class ProductConfig
{
    /**
     * @var array|mixed
     */
    private array $productConfig;

    /**
     * Initializes the product config path.
     */
    public function __construct()
    {
        $this->productConfig = require __DIR__ . $_ENV['PRODUCT_CONFIG'];
    }

    /**
     * @param string $productType
     * @return array|null
     * @throws InvalidArgumentException
     */
    public function getProductConfig(string $productType): ?array
    {
        if (!$this->productConfig[$productType]) {
            throw new InvalidArgumentException("Invalid product type configuration for type: $productType");
        }

        return $this->productConfig[$productType] ?? null;
    }
}
