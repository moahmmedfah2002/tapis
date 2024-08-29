<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use App\Repository\TestRepository;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(CategoryRepository $categoryRepository ,SerializerInterface $serial)
    {

         $categories = $categoryRepository->findAll();
         
         $categories=$serial->serialize($categories,'json', ['groups' => ['nom','desc','sous','type']]);
        return  new JsonResponse($categories,Response::HTTP_OK,[],TRUE);

    }
}
