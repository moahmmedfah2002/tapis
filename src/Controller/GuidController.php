<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class GuidController extends  AbstractController
{
    /**
     * @Route("/")
     *
     *
     *
     */
    public function home(): Response
    {
        return $this->render("home.html.twig");

    }

}