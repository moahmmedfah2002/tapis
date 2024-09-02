<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * @Route("/produits")
     */
    public function index(ProduitRepository $produitRepository ,SerializerInterface $serial)
    {


        $produites = $produitRepository->findAll();

        $categories=$serial->serialize($produites,'json', ['groups' => ['p','cat','nom','id']]);
        return  new JsonResponse($categories,Response::HTTP_OK,[],TRUE);

    }

    /**
     * @Route("/produit")
     */
    public function produit(ProduitRepository $produitRepository,SerializerInterface $serializer,Request $request){
        $produit=new Produit();
        $produit->setTitre("test");
        $produit->setCouleur("blue");
        $produit->setEtat("neuve");
        $produit->setLongueur(100);
        $produit->setLargeur(100);
        $produit->setPrix(2000);
        $produit->setDisponabilite(true);
        $produit->setDescription("test");
        $produit->setPoids(20);
        $produit->setModel("test");
        $produit->setModel("test");
        $produit->setQualite("test");
        $produit->setMatiere("test");
        $produit->setReference(24);
        $produit->setImage("test");
        $produit->setUpdatedAt(new \DateTime());

        $produitRepository->add($produit,true);
        if(!empty($_GET['id'])) {
            $produit = $produitRepository->findById($request->get('id'));

            $produit=$serializer->serialize($produit,'json',['groups'=>'p']);
            return new JsonResponse($produit,200,[],true);

        }else{
            return $this->redirect("/");

        }

    }

//    /**
//     * @Route("/addProduct",methods={POST})
//     */
//    public function addProduct(ProduitRepository $produitRepository ,SerializerInterface $serializer,Request $request){
//
//
//
//        $val=$request->getContent();
//        $f=fopen("./hi.png",'w');
//        fwrite($f,$val);
//        fclose($f);
//
//
//        return new JsonResponse("{img:$val}",200,[],true);
//
//
//    }



}
