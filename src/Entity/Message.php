<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $Date_creation;

    #[ORM\Column(type: 'string', length: 255)]
    private $texte;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private $Auteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getAuteur(): ?User
    {
        return $this->Auteur;
    }

    public function setAuteur(?User $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }
}
