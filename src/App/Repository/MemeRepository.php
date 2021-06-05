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

    public function findById($id): array
    {
        $query = $this->database->prepare('SELECT * FROM `meme` WHERE `id`=:id');
        $query->execute([
            'id' => $id
        ]);

        $meme = $query->fetch();

        return $meme;
    }

    public function addMeme(Meme $meme){
        var_dump($meme->getImg() . PHP_EOL);
        var_dump($meme->getAuthor() . PHP_EOL);
        $query = $this->database->prepare("INSERT INTO meme(img, author) VALUES(:img, :author)");
        $query->execute([
            'img'   => $meme->getImg(),
            'author'    => $meme->getAuthor()
        ]);
    }
}