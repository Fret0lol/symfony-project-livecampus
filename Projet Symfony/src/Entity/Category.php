<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\ManyToMany(targetEntity: Board::class)]
    private $Board_id;

    public function __construct()
    {
        $this->Board_id = new ArrayCollection();
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
     * @return Collection<int, Board>
     */
    public function getBoardId(): Collection
    {
        return $this->Board_id;
    }

    public function addBoardId(Board $boardId): self
    {
        if (!$this->Board_id->contains($boardId)) {
            $this->Board_id[] = $boardId;
        }

        return $this;
    }

    public function removeBoardId(Board $boardId): self
    {
        $this->Board_id->removeElement($boardId);

        return $this;
    }
}
