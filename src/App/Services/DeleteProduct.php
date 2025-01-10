<?php

namespace Main\App\Services;

use Main\App\Models\Domain\Repository\AttributeRepositoryInterface;
use Main\App\Models\Domain\Repository\ProductRepositoryInterface;

/**
 * Responsible for calling corresponding database entries and deleting product/attribute combo.
 */
class DeleteProduct
{
    /**
     * @param ProductRepositoryInterface $productRepository
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(
        protected readonly ProductRepositoryInterface $productRepository,
        protected readonly AttributeRepositoryInterface $attributeRepository,
    ) {
    }

    /**
     * Based on provided product ID, deletes all corresponding attribute/product entries.
     *
     * @param mixed $productId
     * @return void
     */
    public function delete(mixed $productId): void
    {
        $this->attributeRepository->deleteAttributeByProductId($productId);
        $this->productRepository->deleteProductById($productId);
    }
}
