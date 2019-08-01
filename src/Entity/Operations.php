<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperationsRepository")
 */
class Operations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $soldeAnterieur;

    /**
     * @ORM\Column(type="bigint")
     */
    private $nouveauSolde;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedeDepot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="Operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoldeAnterieur(): ?int
    {
        return $this->soldeAnterieur;
    }

    public function setSoldeAnterieur(int $soldeAnterieur): self
    {
        $this->soldeAnterieur = $soldeAnterieur;

        return $this;
    }

    public function getNouveauSolde(): ?int
    {
        return $this->nouveauSolde;
    }

    public function setNouveauSolde(int $nouveauSolde): self
    {
        $this->nouveauSolde = $nouveauSolde;

        return $this;
    }

    public function getDatedeDepot(): ?\DateTimeInterface
    {
        return $this->datedeDepot;
    }

    public function setDatedeDepot(\DateTimeInterface $datedeDepot): self
    {
        $this->datedeDepot = $datedeDepot;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }
}
