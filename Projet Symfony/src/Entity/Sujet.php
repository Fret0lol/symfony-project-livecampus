<?php

namespace App\Entity;

use App\Repository\SujetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SujetRepository::class)]
class Sujet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'datetime')]
    private $Created_at;

    #[ORM\Column(type: 'string', length: 255)]
    private $text;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $User_id;

    #[ORM\ManyToMany(targetEntity: Board::class, mappedBy: 'Category_id')]
    private $Boards_id;

    public function __construct()
    {
        $this->Boards_id = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeInterface $Created_at): self
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(?User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    /**
     * @return Collection<int, Board>
     */
    public function getBoardsId(): Collection
    {
        return $this->Boards_id;
    }

    public function addBoardsId(Board $boardsId): self
    {
        if (!$this->Boards_id->contains($boardsId)) {
            $this->Boards_id[] = $boardsId;
            $boardsId->addCategoryId($this);
        }

        return $this;
    }

    public function removeBoardsId(Board $boardsId): self
    {
        if ($this->Boards_id->removeElement($boardsId)) {
            $boardsId->removeCategoryId($this);
        }

        return $this;
    }
}
