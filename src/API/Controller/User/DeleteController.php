<?php

namespace App\API\Controller\User;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ListController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ListController constructor.
     * @param EntityManagerInterface $em
     * @param SerializerInterface $serializer
     */
    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    public function __invoke()
    {
        $users = $this->em->getRepository(User::class)->findAll();
        return new JsonResponse(['users' => $this->serializer->serialize($users, 'json')]);
    }
}