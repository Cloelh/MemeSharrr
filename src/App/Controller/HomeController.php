<?php

namespace App\Controller;

use App\Aware\MemeRepositoryAware;
use App\Aware\MemeRepositoryAwareTrait;
use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;
use App\Aware\TemplateEngineAware;
use App\Aware\TemplateEngineAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class HomeController implements TemplateEngineAware, RequestAware, MemeRepositoryAware
{
    use RequestAwareTrait;
    use TemplateEngineAwareTrait;
    use MemeRepositoryAwareTrait;

    public function home(): Response
    {
        $memes = $this->memeRepository->findLastMeme();

        return new Response($this->templateEngine->render(
            'Home\home.html.twig',
            ["memes" => $memes],
        ));
    }
}
