<?php


namespace App\Controller;
use App\Aware\CommentRepositoryAware;
use App\Aware\CommentRepositoryAwareTrait;
use App\Aware\MemeRepositoryAware;
use App\Aware\MemeRepositoryAwareTrait;
use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;
use App\Aware\TemplateEngineAware;
use App\Aware\TemplateEngineAwareTrait;
use App\Entity\Comment;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Meme;

class MemeController implements TemplateEngineAware, RequestAware, MemeRepositoryAware, CommentRepositoryAware
{
    use RequestAwareTrait;
    use TemplateEngineAwareTrait;
    use MemeRepositoryAwareTrait;
    use CommentRepositoryAwareTrait;

    public function listMemes(): Response
    {
        $memes = $this->memeRepository->findAll();

        return new Response($this->templateEngine->render(
            'Meme\list-of-memes.html.twig',
            ["memes" => $memes],
        ));
    }

    public function singleMeme(): Response
    {
        $idMeme = $this->request->query->get('id');

        if ($this->request->request->has('addComment')
            && $this->request->request->has('comment')
            && $this->request->request->has('author')
            && !empty($this->request->request->has('comment'))
            && !empty($this->request->request->has('author'))
        ){
            $comment = new Comment($this->request->request->get('comment'), $this->request->request->get('author'), $idMeme);
            $this->commentRepository->addComment($comment);
        }


        $meme = $this->memeRepository->findById($idMeme);
        $comments = $this->commentRepository->findAll($idMeme);

        return new Response($this->templateEngine->render(
            'Meme\single-meme.html.twig',
            [
                'meme' => $meme,
                'comments'=> $comments
            ]
        ));
    }
}