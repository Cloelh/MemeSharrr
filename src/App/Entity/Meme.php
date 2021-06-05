<?php

namespace App\Entity;

class Meme
{
    private ?int $id = null;

    private ?string $img = null;

    private ?string $author = null;

    public function __construct(?string $author, ?string $img){
        $this->img = $img;
        $this->author = $author;
    }

    static public function createFromData(array $data): Meme {
        $meme = new Meme(
            $data['img'],
            $data['author'],
        );

        $fieldsMap = [
            'id' => 'id',
            'img' => 'img',
            'author' => 'author',
        ];

        foreach ($fieldsMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $meme->{$propertyName} = $data[$fieldName];
            }
        }

        return $meme;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }
}
