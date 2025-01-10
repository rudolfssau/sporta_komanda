<?php

namespace Main\App\Controllers;

use Main\App\Controllers\Contract\Controller;
use Main\App\Models\Domain\Repository\NewsRepositoryInterface;

class Login extends Controller
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

        $this->newsRepository->verifyUser($data["email"], $data["password"]);
    }
}
