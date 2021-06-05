<?php


namespace App\Controller;
use App\Aware\MemeRepositoryAware;
use App\Aware\MemeRepositoryAwareTrait;
use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;
use App\Aware\TemplateEngineAware;
use App\Aware\TemplateEngineAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class MemeController implements TemplateEngineAware, RequestAware, MemeRepositoryAware
{
    use RequestAwareTrait;
    use TemplateEngineAwareTrait;
    use MemeRepositoryAwareTrait;

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
        $meme = $this->memeRepository->findById($idMeme);

        return new Response($this->templateEngine->render(
            'Meme\single-meme.html.twig',
            ["meme" => $meme],
        ));
    }
}