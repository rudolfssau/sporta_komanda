<?php

namespace Main\App\Controllers;

use Main\App\Controllers\Contract\Controller;

/**
 * Based on the product id, deletes all associated members form the database.
 */
class Logout extends Controller
{

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
    }
}
