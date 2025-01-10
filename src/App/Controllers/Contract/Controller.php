<?php

namespace Main\App\Controllers\Contract;

/**
 * Base class for controller creation.
 */
abstract class Controller
{
    /**
     * Base method for controllers.
     */
    abstract public function __invoke();
}
