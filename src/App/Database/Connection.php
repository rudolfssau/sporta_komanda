<?php

namespace Main\App\Database;

use PDO;
use PDOException;

/**
 * Database connection set up.
 */
class Connection
{
    /**
     * Database connection.
     *
     * @return PDO
     * @throws PDOException
     */
    public function connect(): PDO
    {
        $OPTIONS = [
            \PDO::ATTR_ERRMODE => (int) $_ENV['DB_OPTIONS_ERRMODE'],
            \PDO::ATTR_EMULATE_PREPARES => filter_var(
                $_ENV['DB_OPTIONS_EMULATE_PREPARES'],
                FILTER_VALIDATE_BOOLEAN
            ),
        ];
        return new PDO(
            'mysql:host='.$_ENV['DB_HOST'].';
            port=3306;dbname='.$_ENV['DB_NAME'].';
            charset=utf8mb4',
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $OPTIONS
        );
    }
}
