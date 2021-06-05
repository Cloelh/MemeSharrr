<?php

namespace App\Aware;

use Twig\Environment;

interface TemplateEngineAware
{
    public function provideTemplateEngine(Environment $templateEngine);
}
