<?php

namespace Main\App\Controllers;

use Main\App\Controllers\Contract\Controller;
use Main\App\Database\Connection;
use Main\App\Models\Domain\Repository\NewsRepositoryInterface;

class FetchPosts extends Controller
{
    /**
     * @param Connection $connection
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(
        protected readonly Connection $connection,
        protected readonly NewsRepositoryInterface $newsRepository
    ) {
    }

    /**
     * Creates a new object and passes it into a json format over to Ajax.
     *
     * @return array
     */
    public function __invoke(): array
    {
        header('Content-Type: application/json');

        return $this->newsRepository->fetchAttribute();
    }
}
