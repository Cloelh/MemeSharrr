<?php

namespace App\Aware;

use Symfony\Component\HttpFoundation\Request;

trait RequestAwareTrait
{
    private ?Request $request = null;

    public function provideRequest(Request $request)
    {
        $this->request = $request;
    }
}
