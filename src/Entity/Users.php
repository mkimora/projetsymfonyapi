<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
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
    private $nomutilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motdepasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseU;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatU;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partenaire", mappedBy="Users")
     */
    private $partenaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operations", mappedBy="Users")
     */
    private $operations;

    public function __construct()
    {
        $this->partenaires = new ArrayCollection();
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomutilisateur(): ?string
    {
        return $this->nomutilisateur;
    }

    public function setNomutilisateur(string $nomutilisateur): self
    {
        $this->nomutilisateur = $nomutilisateur;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getAdresseU(): ?string
    {
        return $this->adresseU;
    }

    public function setAdresseU(string $adresseU): self
    {
        $this->adresseU = $adresseU;

        return $this;
    }

    public function getEtatU(): ?string
    {
        return $this->etatU;
    }

    public function setEtatU(string $etatU): self
    {
        $this->etatU = $etatU;

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

    /**
     * @return Collection|Partenaire[]
     */
    public function getPartenaires(): Collection
    {
        return $this->partenaires;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaires->contains($partenaire)) {
            $this->partenaires[] = $partenaire;
            $partenaire->setUsers($this);
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        if ($this->partenaires->contains($partenaire)) {
            $this->partenaires->removeElement($partenaire);
            // set the owning side to null (unless already changed)
            if ($partenaire->getUsers() === $this) {
                $partenaire->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Operations[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operations $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setUsers($this);
        }

        return $this;
    }

    public function removeOperation(Operations $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getUsers() === $this) {
                $operation->setUsers(null);
            }
        }

        return $this;
    }
}
