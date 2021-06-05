<?php


namespace App\Entity;

class Comment
{
    private ?int $id = null;

    private ?string $author = null;

    private ?string $comment = null;

    private ?int $id_meme = null;

    public function __construct(?string $author, ?string $comment, ?int $id_meme){
        $this->author = $author;
        $this->comment = $comment;
        $this->id_meme = $id_meme;
    }

    static public function createFromData(array $data): Comment {
        $comment = new Comment(
            $data['author'],
            $data['comment'],
            intval($data['id_meme']),
        );

        $fieldsMap = [
            'id' => 'id',
            'author' => 'author',
            'comment' => 'comment',
            'id_meme' => 'id_meme'
        ];

        foreach ($fieldsMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $comment->{$propertyName} = $data[$fieldName];
            }
        }

        return $comment;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return int|null
     */
    public function getIdMeme(): ?int
    {
        return $this->id_meme;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param int|null $id_meme
     */
    public function setIdMeme(?int $id_meme): void
    {
        $this->id_meme = $id_meme;
    }

}