<?php

namespace App\Aware;

use Twig\Environment;

trait TemplateEngineAwareTrait
{
    private ?Environment $templateEngine = null;

    public function provideTemplateEngine(Environment $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }
}
