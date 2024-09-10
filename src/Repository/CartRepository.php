<?php

namespace App\Repository;

use App\Entity\Cart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    /**
     * Find a cart by session ID.
     */
    public function findBySessionId(string $sessionId): ?Cart
    {
        return $this->findOneBy(['sessionId' => $sessionId]);
    }

    /**
     * Create and save a new cart with the given session ID.
     */
    public function createCart(string $sessionId): Cart
    {
        $cart = new Cart();
        $cart->setSessionId($sessionId);
        $this->_em->persist($cart);
        $this->_em->flush();

        return $cart;
    }
}
