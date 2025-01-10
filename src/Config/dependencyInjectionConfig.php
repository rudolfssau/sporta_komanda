<?php

use Main\App\Models\Domain\Repository\AttributeRepositoryInterface;
use Main\App\Models\Domain\Repository\NewsRepositoryInterface;
use Main\App\Models\Domain\Repository\ProductRepositoryInterface;
use Main\App\Models\Persistence\AttributeMySQLRepository;
use Main\App\Models\Persistence\NewsMySQLRepository;
use Main\App\Models\Persistence\ProductMySQLRepository;

/**
 * Defines the array of interface-to-class bindings for the container.
 *
 * @return array<class-string, class-string>
 */
return [
    ProductRepositoryInterface::class => ProductMySQLRepository::class,
    AttributeRepositoryInterface::class => AttributeMySQLRepository::class,
    NewsRepositoryInterface::class => NewsMySQLRepository::class,
];
