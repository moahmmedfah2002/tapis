<?php


namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 *  @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcentagePromo;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="promos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;
     

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getPourcentagePromo(): ?int
    {
        return $this->pourcentagePromo;
    }

    public function setPourcentagePromo(int $pourcentagePromo): self
    {
        $this->pourcentagePromo = $pourcentagePromo;

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

    /**
     * Calcule et retourne le nouveau prix après réduction.
     *
     * @return float
     */
    public function getNouveauPrix(): float
    {
        $prixProduit = $this->produit->getPrix(); // Suppose que la méthode getPrix existe dans l'entité Produit
        $pourcentageReduction = $this->pourcentagePromo;

        // Calcul du nouveau prix après réduction
        $nouveauPrix = $prixProduit - ($prixProduit * $pourcentageReduction / 100);

        return $nouveauPrix;
    }
}
