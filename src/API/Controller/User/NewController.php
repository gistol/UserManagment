<?php

namespace App\API\Controller\User;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * ListController constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(User $user)
    {
        $this->em->remove($user);
        $this->em->flush();
        return new JsonResponse(['success' => true]);
    }
}