<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nce = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_Et = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_Et = null;

    #[ORM\ManyToOne]
    private ?Soutenance $refSoutenance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNce(): ?int
    {
        return $this->nce;
    }

    public function setNce(int $nce): self
    {
        $this->nce = $nce;

        return $this;
    }

    public function getNomEt(): ?string
    {
        return $this->nom_Et;
    }

    public function setNomEt(string $nom_Et): self
    {
        $this->nom_Et = $nom_Et;

        return $this;
    }

    public function getPrenomEt(): ?string
    {
        return $this->prenom_Et;
    }

    public function setPrenomEt(string $prenom_Et): self
    {
        $this->prenom_Et = $prenom_Et;

        return $this;
    }

    public function getRefSoutenance(): ?Soutenance
    {
        return $this->refSoutenance;
    }

    public function setRefSoutenance(?Soutenance $refSoutenance): self
    {
        $this->refSoutenance = $refSoutenance;

        return $this;
    }
   
}
