<?php

namespace App\API\Controller\User;


use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var FormInterface
     */
    private $form;

    /**
     * ListController constructor.
     * @param EntityManagerInterface $em
     * @param FormFactoryInterface $form
     */
    public function __construct(EntityManagerInterface $em, FormFactoryInterface $form)
    {
        $this->em = $em;
        $this->form = $form;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $form = $this->form->create(UserType::class);
        $user = json_decode($request->getContent(), true);
        $form->submit($user);
        if ($form->isValid()) {
            $this->em->persist($user);
            $this->em->flush();
            return new JsonResponse(['success' => true], Response::HTTP_CREATED);
        }
        return new JsonResponse(['success' => false, 'errors' => $form->getErrors()], Response::HTTP_BAD_REQUEST);
    }
}