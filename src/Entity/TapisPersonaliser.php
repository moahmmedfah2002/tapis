<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use App\Repository\TapisPersonaliserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=TapisPersonaliserRepository::class)
 * @Vich\Uploadable
 */
class TapisPersonaliser
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
    private $name;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Telephone;
    /**
     * @ORM\Column(type="string", length=800)
     */
    private $Description;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image2;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image2")
     * @var File
     */
    private $ImageFile2;

    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image1;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image1")
     * @var File
     */
    private $ImageFile1;

    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $Image3;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="Image3")
     * @var File
     */
    private $ImageFile3;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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


    public function getTelephone()
    {
        return $this->Telephone;
    }

    public function setTelephone($Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setImageFile1(File $image = null)
    {
        $this->ImageFile1 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile1()
    {
        return $this->ImageFile1;
    }
    public function getImage1(): ?string
    {
        return $this->Image1;
    }

    public function setImage1(?string $Image): self
    {
        $this->Image1 = $Image;

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

    public function setImageFile2(File $image = null)
    {
        $this->ImageFile2 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile2()
    {
        return $this->ImageFile2;
    }
    public function getImage2(): ?string
    {
        return $this->Image2;
    }

    public function setImage2(?string $Image): self
    {
        $this->Image2 = $Image;

        return $this;
    }


    public function setImageFile3(File $image = null)
    {
        $this->ImageFile3 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile3()
    {
        return $this->ImageFile3;
    }
    public function getImage3(): ?string
    {
        return $this->Image3;
    }

    public function setImage3(?string $Image): self
    {
        $this->Image3 = $Image;

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
}
