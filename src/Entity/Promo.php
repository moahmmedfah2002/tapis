<?php

namespace App\Entity;

use EasyCorp\Bundle\EasyAdminBundle\Config\Field\Configurator\IntegerFieldConfigurator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Field\FieldConfigurator;
use Symfony\Component\HttpFoundation\File\File;
use App\Repository\PromoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use Twig\Environment;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 * @Vich\Uploadable
 */
class Promo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ref;

    /**
     * @ORM\Column(type="integer")
     */
    private $Longueur;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image")
     * @var File
     */
    private $ImageFile;
    /**
     * @ORM\Column(type="integer")
     */
    private $Largeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $pourcentagePromo;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="float", options={"default": 0})
     */
    private $prix = 0;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix_base;
    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="promo", cascade={"remove"})
     */
    private $commandes;

    /**
     * @ORM\Column(type="float")
     */
    private $Poids;

    /**
     * @ORM\Column(type="text")
     */
    private $Dessin;

    /**
     * @ORM\Column(type="text")
     */
    private $Model;
    /**
     * @ORM\Column(type="text")
     */
    private $Qualite;

    /**
     * @ORM\Column(type="text")
     */
    private $Matiere;

    /**
     * @ORM\Column(type="text")
     */
    private $Traitement;

    /**
     * @ORM\Column(type="text")
     */
    private $Fabrication;

    /**
     * @ORM\Column(type="text")
     */
    private $Methode_fabrication;

    /**
     * @ORM\Column(type="text")
     */
    private $Entretien;

    /**
     * @ORM\Column(type="float")
     */
    private $Supercifie;
    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }
    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setPromo($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getPromo() === $this) {
                $commande->setPromo(null);
            }
        }

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->Ref;
    }

    public function setRef(string $Ref): self
    {
        $this->Ref = $Ref;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->Longueur;
    }

    public function setLongueur(int $Longueur): self
    {
        $this->Longueur = $Longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->Largeur;
    }

    public function setLargeur(int $Largeur): self
    {
        $this->Largeur = $Largeur;

        return $this;
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
    /**
     * Calcule et retourne le nouveau prix après réduction.
     *
     * @return float
     */

    public function getPrix(): float
    {
        return $this->Prix_base * (1 - $this->pourcentagePromo / 100);
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixBase(): ?float
    {
        return $this->Prix_base;
    }

    public function setPrixBase(float $Prix_base): self
    {
        $this->Prix_base = $Prix_base;

        return $this;
    }
    public function setImageFile(File $image = null)
    {
        $this->ImageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->ImageFile;
    }
    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    public function getPrixCalcule(Promo $promo)
    {
        return $promo->getPrixBase() * (1 - $promo->getPourcentagePromo() / 100);
    }
    public function __toString(): string
    {
        return $this->Titre;
    }

    public function getPoids(): ?float
    {
        return $this->Poids;
    }

    public function setPoids(float $Poids): self
    {
        $this->Poids = $Poids;

        return $this;
    }

    public function getDessin(): ?string
    {
        return $this->Dessin;
    }

    public function setDessin(string $Dessin): self
    {
        $this->Dessin = $Dessin;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }
    public function getQualite(): ?string
    {
        return $this->Qualite;
    }

    public function setQualite(string $Qualite): self
    {
        $this->Qualite = $Qualite;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->Matiere;
    }

    public function setMatiere(string $Matiere): self
    {
        $this->Matiere = $Matiere;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->Traitement;
    }

    public function setTraitement(string $Traitement): self
    {
        $this->Traitement = $Traitement;

        return $this;
    }

    public function getFabrication(): ?string
    {
        return $this->Fabrication;
    }

    public function setFabrication(string $Fabrication): self
    {
        $this->Fabrication = $Fabrication;

        return $this;
    }

    public function getMethodeFabrication(): ?string
    {
        return $this->Methode_fabrication;
    }

    public function setMethodeFabrication(string $Methode_fabrication): self
    {
        $this->Methode_fabrication = $Methode_fabrication;

        return $this;
    }

    public function getEntretien(): ?string
    {
        return $this->Entretien;
    }

    public function setEntretien(string $Entretien): self
    {
        $this->Entretien = $Entretien;

        return $this;
    }

    public function getSupercifie(): ?float
    {
        return $this->Supercifie;
    }

    public function setSupercifie(float $Supercifie): self
    {
        $this->Supercifie = $Supercifie;

        return $this;
    }
    /**
     * @return string
     */
    public function getFormattedSupercifie(): string
    {
        // Format the Supercifie value as needed (e.g., add units, convert, etc.)
        // Here's an example:
        return $this->Supercifie . ' m² (' . $this->convertSquareMetersToSquareFeet($this->Supercifie) . 'ft²)';
    }

    /**
     * @param int $squareMeters
     * @return float
     */
    private function convertSquareMetersToSquareFeet(int $squareMeters): float
    {
        // Add your conversion logic here if needed
        // This is just a placeholder
        return $squareMeters * 10.764; // 1 square meter is approximately 10.764 square feet
    }
}
