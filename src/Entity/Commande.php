<?php

// src/Entity/Commande.php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("id")
     */
    private $id;

    /**
     * @ORM\Column(type="string",nullable=true, length=255)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string",nullable=true, length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string",nullable=true, length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="commandes")
     *@Groups("id")
     */
    private $produit;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @group(i)
     */
    private $Email;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Livraison;
    /**
     * @ORM\ManyToOne(targetEntity=Promo::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $promo;

    // ...use Symfony\Component\Serializer\Annotation\Groups;


    public function getPromo(): ?Promo
    {
        return $this->promo;
    }

    public function setPromo(?Promo $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        // Assurez-vous que la date est automatiquement définie lors de la création
        $this->date = new \DateTime();
    }

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function isLivraison(): ?bool
    {
        return $this->Livraison;
    }

    public function setLivraison(bool $Livraison): self
    {
        $this->Livraison = $Livraison;

        return $this;
    }
}
