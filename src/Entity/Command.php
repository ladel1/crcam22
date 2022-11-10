<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandRepository::class)
 */
class Command
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity=Line::class, mappedBy="command")
     */
    private $commandProducts;



    public function __construct()
    {
        $this->commandProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, Line>
     */
    public function getCommandProducts(): Collection
    {
        return $this->commandProducts;
    }

    public function addCommandProduct(Line $commandProduct): self
    {
        if (!$this->commandProducts->contains($commandProduct)) {
            $this->commandProducts[] = $commandProduct;
            $commandProduct->setCommand($this);
        }

        return $this;
    }

    public function removeCommandProduct(Line $commandProduct): self
    {
        if ($this->commandProducts->removeElement($commandProduct)) {
            // set the owning side to null (unless already changed)
            if ($commandProduct->getCommand() === $this) {
                $commandProduct->setCommand(null);
            }
        }

        return $this;
    }
}
