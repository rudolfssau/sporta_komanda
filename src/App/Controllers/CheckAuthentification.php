<?php

namespace Main\App\Controllers;

use Main\App\Controllers\Contract\Controller;

class CheckAuthentification extends Controller
{

    /**
     * @return mixed
     */
    public function __invoke(): array
    {
        header('Content-Type: application/json');
        return ['status' => $_SESSION['loggedin']];
    }
}
