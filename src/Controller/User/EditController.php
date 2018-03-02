<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EditController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * EditController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function __invoke(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);

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