<?php

declare(strict_types=1);

namespace Main\Core;

use Exception;

/**
 * View object generation.
 */
class View
{
    /**
     * render() is responsible for rendering view files.
     * It searches if the file is present, and afterward it loads it.
     *
     * @throws Exception
     */
    public function render(string $view, array $args = []): string
    {
        extract($args, EXTR_SKIP);
        ob_start();
        $string = $_ENV["VIEW_TEMPLATES"] . $view;
        $file = $string;
        if (!is_readable($file)) {
            throw new Exception("$file not found");
        }
        require $file;
        $viewObject = ob_get_contents();

        return (string) $viewObject;
    }
}

