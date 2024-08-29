<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * @Route("/home")
     */
    public function index(ProduitRepository $produitRepository ,SerializerInterface $serial)
    {

        $produites = $produitRepository->findAll();

        $categories=$serial->serialize($produites,'json', ['groups' => ['nom','desc','sous','type']]);
        return  new JsonResponse($categories,Response::HTTP_OK,[],TRUE);

    }
}
