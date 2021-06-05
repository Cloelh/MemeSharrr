<?php

namespace App\Controller;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;
use App\Aware\TemplateEngineAware;
use App\Aware\TemplateEngineAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class HomeController implements TemplateEngineAware, RequestAware
{
    use RequestAwareTrait;
    use TemplateEngineAwareTrait;

    public function home(): Response
    {
        return new Response($this->templateEngine->render('Home\home.html.twig'));
    }
}
