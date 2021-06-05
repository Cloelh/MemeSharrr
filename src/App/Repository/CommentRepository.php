<?php


namespace App\Repository;

use App\Aware\DatabaseConnectionAware;
use App\Aware\DatabaseConnectionAwareTrait;
use App\Entity\Comment;

class CommentRepository implements DatabaseConnectionAware
{
    use DatabaseConnectionAwareTrait;

    public function findAll(int $idMeme): array
    {
        $query = $this->database->prepare('SELECT * FROM `comment` WHERE `id_meme` = :idMeme ORDER BY `id` DESC');
        $query->execute([
            'idMeme' => $idMeme
        ]);

        $comments = [];

        while (($commentData = $query->fetch())) {
            $comments[] = Comment::createFromData($commentData);
        }

        return $comments;
    }

    public function addComment(string $comment, string $author, int $idMeme){
        $query = $this->database->prepare("INSERT INTO comment(comment, author, id_meme) VALUES(:comment, :author, :idMeme)");
        $query->execute([
            'comment'   => $comment,
            'author'    => $author,
            'idMeme'   => $idMeme,
        ]);
    }

    public function deleteAll(){
        $query = $this->database->prepare("TRUNCATE TABLE `comment`");
        $query->execute();
    }

}