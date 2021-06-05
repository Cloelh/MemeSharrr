<?php

namespace App\Aware;

use App\Repository\MemeRepository;

interface MemeRepositoryAware
{
    public function provideMemeRepository(MemeRepository $memeRepository);
}
