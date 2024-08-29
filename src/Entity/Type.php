<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 * @Vich\Uploadable
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("nom")
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Descriptions;
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
     * @ORM\ManyToOne(targetEntity=SousCategory::class, inversedBy="types" ,cascade={"remove"})
     */
    private $SousCategorie;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="Types",cascade={"remove"})
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
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

    public function getDescriptions(): ?string
    {
        return $this->Descriptions;
    }

    public function setDescriptions(string $Descriptions): self
    {
        $this->Descriptions = $Descriptions;

        return $this;
    }

    public function getSousCategorie(): ?SousCategory
    {
        return $this->SousCategorie;
    }

    public function setSousCategorie(?SousCategory $SousCategorie): self
    {
        $this->SousCategorie = $SousCategorie;

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
            $produit->setTypes($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getTypes() === $this) {
                $produit->setTypes(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->Titre; // Remplacez 'Titre' par le nom de la propriété que vous souhaitez afficher.
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
