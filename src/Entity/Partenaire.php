<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonSociale;

    /**
     * @ORM\Column(type="integer")
     */
    private $ninea;

    /**
     * @ORM\Column(type="bigint")
     */
    private $soldeP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CréerPar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="Partenaire")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="partenaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdresseP(): ?string
    {
        return $this->adresseP;
    }

    public function setAdresseP(string $adresseP): self
    {
        $this->adresseP = $adresseP;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getNinea(): ?int
    {
        return $this->ninea;
    }

    public function setNinea(int $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getSoldeP(): ?int
    {
        return $this->soldeP;
    }

    public function setSoldeP(int $soldeP): self
    {
        $this->soldeP = $soldeP;

        return $this;
    }

    public function getEtatP(): ?string
    {
        return $this->etatP;
    }

    public function setEtatP(string $etatP): self
    {
        $this->etatP = $etatP;

        return $this;
    }

    public function getCréerPar(): ?string
    {
        return $this->CréerPar;
    }

    public function setCréerPar(string $CréerPar): self
    {
        $this->CréerPar = $CréerPar;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPartenaire($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPartenaire() === $this) {
                $user->setPartenaire(null);
            }
        }

        return $this;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }
}
