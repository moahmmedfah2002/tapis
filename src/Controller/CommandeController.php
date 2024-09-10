<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\CartItem;
use App\Entity\Produit;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande/add", name="api_commande", methods={"POST", "OPTIONS"})
     */
    public function addToCart(SerializerInterface $serializer,Request $request,CommandeRepository $commandeRepository,ProduitRepository $produitRepository, EntityManagerInterface $entityManager, SessionInterface $session): JsonResponse
    {
        // Handle CORS preflight request
        if ($request->getMethod() === 'OPTIONS') {
            return $this->corsResponse(new JsonResponse());
        }

        // Decode request data
        $data = json_decode($request->getContent(), true);

        $produit=$produitRepository->findById($data["id"]);
        $full_name=$data["full_name"];
        $telephone=$data["telephone"];
        $adress=$data["adress"];
        $email=$data["email"];
        echo $full_name;

        $commande=new Commande();
        $commande->setProduit($produit[0]);
        $commande->setFullName($full_name);
        $commande->setTelephone($telephone);
        $commande->setAdress($adress);
        $commande->setEmail($email);





        $commandeRepository->add($commande,true);
       $commande=$serializer->serialize($commande,'json',['groups' => ['id']]);
        return new JsonResponse($commande,Response::HTTP_OK,[],true);

    }


    /**
     * Add CORS headers to the response.
     */
    private function corsResponse(JsonResponse $response): JsonResponse
    {
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:3000');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        return $response;
    }
}
