<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @Vich\Uploadable
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Longueur;

    /**
     * @ORM\Column(type="integer")
     */
    private $Largeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponabilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Etat;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $Poids;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Qualite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image")
     * @var File
     */
    private $ImageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="produits", cascade={"remove"})
     */
    private $Category;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategory::class, inversedBy="produits", cascade={"remove"})
     */
    private $SousCategories;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="produits", cascade={"remove"})
     */
    private $Types;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="Produit")
     */
    private $commandes;
    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="produit", orphanRemoval=true)
     */
    private $promos;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function isDisponabilite(): ?bool
    {
        return $this->Disponabilite;
    }

    public function setDisponabilite(bool $Disponabilite): self
    {
        $this->Disponabilite = $Disponabilite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
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

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getSousCategories(): ?SousCategory
    {
        return $this->SousCategories;
    }

    public function setSousCategories(?SousCategory $SousCategories): self
    {
        $this->SousCategories = $SousCategories;

        return $this;
    }

    public function getTypes(): ?Type
    {
        return $this->Types;
    }

    public function setTypes(?Type $Types): self
    {
        $this->Types = $Types;

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

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setProduit($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getProduit() === $this) {
                $commande->setProduit(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->Titre; // Replace 'content' with the property you want to display.
    }


    /**
     * @return Collection|Promotion[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promotion $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->setProduit($this);
        }

        return $this;
    }

    public function removePromo(Promotion $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            // set the owning side to null (unless already changed)
            if ($promo->getProduit() === $this) {
                $promo->setProduit(null);
            }
        }

        return $this;
    }
    /**
     * @return float
     */
    public function getPrixActuel(): float
    {
        $prix = (float)$this->getPrix();
        $currentDate = new \DateTime();
        $hasPromotion = false;

        // Vérifier s'il y a une promotion en cours
        foreach ($this->promos as $promo) {
            if ($promo->getDateDebut() <= $currentDate && $promo->getDateFin() >= $currentDate) {
                $pourcentageReduction = $promo->getPourcentagePromo();
                $nouveauPrix = $prix - ($prix * $pourcentageReduction / 100);
                $prix = $nouveauPrix;
                $hasPromotion = true;
                break;
            }
        }

        // Ajoutons une information de débogage pour voir ce qui se passe
        dump([
            'produit' => $this->getId(),
            'prix' => $this->getPrix(),
            'hasPromotion' => $hasPromotion,
            'prixFinal' => $prix,
        ]);

        // Si le produit n'a pas de promotion en cours, le prix reste inchangé
        return $hasPromotion ? $prix : $prix;
    }
}
