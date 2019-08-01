<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proprioCompte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numCompte;

    /**
     * @ORM\Column(type="bigint")
     */
    private $depotC;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operations", mappedBy="compte")
     */
    private $Operations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Partenaire;

    public function __construct()
    {
        $this->Operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprioCompte(): ?string
    {
        return $this->proprioCompte;
    }

    public function setProprioCompte(string $proprioCompte): self
    {
        $this->proprioCompte = $proprioCompte;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    public function getDepotC(): ?int
    {
        return $this->depotC;
    }

    public function setDepotC(int $depotC): self
    {
        $this->depotC = $depotC;

        return $this;
    }

    /**
     * @return Collection|Operations[]
     */
    public function getOperations(): Collection
    {
        return $this->Operations;
    }

    public function addOperation(Operations $operation): self
    {
        if (!$this->Operations->contains($operation)) {
            $this->Operations[] = $operation;
            $operation->setCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operations $operation): self
    {
        if ($this->Operations->contains($operation)) {
            $this->Operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompte() === $this) {
                $operation->setCompte(null);
            }
        }

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->Partenaire;
    }

    public function setPartenaire(?Partenaire $Partenaire): self
    {
        $this->Partenaire = $Partenaire;

        return $this;
    }
}
