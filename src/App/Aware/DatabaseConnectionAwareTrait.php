<?php

namespace App\Aware;

use PDO;

trait DatabaseConnectionAwareTrait
{
    private ?PDO $database = null;

    public function provideDatabaseConnection(PDO $pdo)
    {
        $this->database = $pdo;
    }
}
