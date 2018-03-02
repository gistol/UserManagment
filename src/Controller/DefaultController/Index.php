<?php

namespace App\Controller\DefaultController;

use Symfony\Component\HttpFoundation\Response;

class Index
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(): Response
    {
        return new Response($this->twig->render('base.html.twig'));
    }

}