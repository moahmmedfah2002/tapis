<?php

// src/Service/CartService.php
namespace App\Service;

use App\Repository\CartRepository;
use App\Entity\Cart;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    private $cartRepository;
    private $session;

    public function __construct(CartRepository $cartRepository, SessionInterface $session)
    {
        $this->cartRepository = $cartRepository;
        $this->session = $session;
    }

    public function getCart(): Cart
    {
        $sessionId = $this->session->getId();
        $cart = $this->cartRepository->findBySessionId($sessionId);

        if (!$cart) {
            $cart = $this->cartRepository->createCart($sessionId);
        }

        return $cart;
    }
}
