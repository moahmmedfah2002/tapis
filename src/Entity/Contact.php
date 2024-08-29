<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="blob")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $new_member;

    /**
     * @ORM\Column(type="string", length=800)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function isNewMember(): ?bool
    {
        return $this->new_member;
    }

    public function setNewMember(bool $new_member): self
    {
        $this->new_member = $new_member;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
