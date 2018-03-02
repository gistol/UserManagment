<?php

namespace App\Controller\User;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $this->em->persist($user);
            $this->em->flush();
            return $this->redirectToRoute('user_index');
        }
        return $this->render('user/new.html.twig', ['form' => $form->createView()]);
    }

}