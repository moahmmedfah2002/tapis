<?php

namespace App\Entity;

use App\Entity\Gallerie;
use Symfony\Component\HttpFoundation\File\File;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * 
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @Vich\Uploadable
 */
class Category
{
    /**
     * @Groups("id")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("nom")
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @Groups("desc")
     * @ORM\Column(type="text")
     */
    private $Description;
    /**
     * @Groups("img")
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image")
     * @var File
     * @Groups("file")
     */
    private $ImageFile;
    /**
     * @Groups("update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @Groups("sous")
     * @ORM\OneToMany(targetEntity=SousCategory::class, mappedBy="Categorie", cascade={"remove"})
     */
    private $sousCategories;

    /**
     * @Groups("produit")
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="Category",cascade={"remove"})
     */
    private $produits;

    /**
     * @Groups("galleries")
     * @ORM\OneToMany(targetEntity=Gallerie::class, mappedBy="Category",cascade={"remove"})
     */
    private $galleries;

    public function __construct()
    {
        $this->sousCategories = new ArrayCollection();
        $this->produits = new ArrayCollection();
        $this->galleries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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

    /**
     * @return Collection<int, SousCategory>
     */
    public function getSousCategories(): Collection
    {
        return $this->sousCategories;
    }

    public function addSousCategory(SousCategory $sousCategory): self
    {
        if (!$this->sousCategories->contains($sousCategory)) {
            $this->sousCategories[] = $sousCategory;
            $sousCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeSousCategory(SousCategory $sousCategory): self
    {
        if ($this->sousCategories->removeElement($sousCategory)) {
            // set the owning side to null (unless already changed)
            if ($sousCategory->getCategorie() === $this) {
                $sousCategory->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCategory($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCategory() === $this) {
                $produit->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Gallerie>
     */
    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallerie $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
            $gallery->setCategory($this);
        }

        return $this;
    }

    public function removeGallery(Gallerie $gallery): self
    {
        if ($this->galleries->removeElement($gallery)) {
            // set the owning side to null (unless already changed)
            if ($gallery->getCategory() === $this) {
                $gallery->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->Nom;
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
}
