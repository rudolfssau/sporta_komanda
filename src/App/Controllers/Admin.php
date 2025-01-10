<?php

namespace Main\App\Controllers;

use Exception;
use Main\App\Controllers\Contract\Controller;
use Main\Core\View;

/**
 * Generates the main product page view.
 */
class Admin extends Controller
{
    /**
     * @param View $view
     */
    public function __construct(
        protected readonly View $view
    ) {
    }

    /**
     * Responsible for rendering the Home/index.php file with the help of the view class located in src/Core/View.
     *
     * @return string
     * @throws Exception
     */
    public function __invoke(): string
    {
        return $this->view->render('Authentification/Admin/index.php');
    }
}
