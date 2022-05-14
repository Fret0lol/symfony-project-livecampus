<?php

namespace App\Entity;

use App\Repository\BoardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoardRepository::class)]
class Board
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\ManyToMany(targetEntity: Sujet::class, inversedBy: 'Boards_id')]
    private $Category_id;

    public function __construct()
    {
        $this->Category_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, Sujet>
     */
    public function getCategoryId(): Collection
    {
        return $this->Category_id;
    }

    public function addCategoryId(Sujet $categoryId): self
    {
        if (!$this->Category_id->contains($categoryId)) {
            $this->Category_id[] = $categoryId;
        }

        return $this;
    }

    public function removeCategoryId(Sujet $categoryId): self
    {
        $this->Category_id->removeElement($categoryId);

        return $this;
    }
}
