<?php

namespace App\Repository;

use App\Aware\DatabaseConnectionAware;
use App\Aware\DatabaseConnectionAwareTrait;
use App\Entity\Meme;

class MemeRepository implements DatabaseConnectionAware
{
    use DatabaseConnectionAwareTrait;

    public function findLastMeme(): array
    {
        $query = $this->database->prepare('SELECT * FROM `meme` ORDER BY `id` DESC LIMIT 10');
        $query->execute();

        $memes = [];

        while (($memeData = $query->fetch())) {
            $memes[] = Meme::createFromData($memeData);
        }
        return $memes;
    }

    public function findAll(): array
    {
        $query = $this->database->prepare('SELECT * FROM `meme` ORDER BY `id` DESC');
        $query->execute();

        $memes = [];

        while (($memeData = $query->fetch())) {
            $memes[] = Meme::createFromData($memeData);
        }
        return $memes;
    }
}