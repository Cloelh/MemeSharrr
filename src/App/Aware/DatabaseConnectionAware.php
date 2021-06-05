<?php

namespace App\Aware;

interface DatabaseConnectionAware
{
    public function provideDatabaseConnection(\PDO $pdo);
}
