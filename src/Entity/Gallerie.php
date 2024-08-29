<?php

namespace App\Entity;

use App\Repository\GallerieRepository;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=GallerieRepository::class)
 * @Vich\Uploadable
 */
class Gallerie
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
     * @ORM\Column(type="text")
     */
    private $Description;
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
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="galleries",cascade={"remove"})
     */
    private $Category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reference;

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
    private $Traitement;

    /**
     * @ORM\Column(type="text")
     */
    private $Fabrication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Methode_fabrication;

    /**
     * @ORM\Column(type="text")
     */
    private $Entretien;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

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

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

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
}
