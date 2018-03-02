<?php

namespace App\Controller\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewController extends Controller
{
    public function __invoke(): Response
    {
        return $this->render('user/index.html.twig');
    }

}