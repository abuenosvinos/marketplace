<?php

namespace App\MarketPlace\Infrastructure\UI\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        return new Response('OK');
    }
}