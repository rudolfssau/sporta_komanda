<?php

namespace Main\App\Controllers;

use Main\App\Controllers\Contract\Controller;
use Main\App\Models\Domain\Repository\NewsRepositoryInterface;

class Comment extends Controller
{
    /**
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(
        protected NewsRepositoryInterface $newsRepository
    ) {
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        $status = $this->newsRepository->insertComment($data['postID'], $data['comment']);

        print_r($status);
    }
}
