<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoutenanceRepository::class)]
class Soutenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numJury = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSoutenance = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\ManyToOne(inversedBy: 'refEnseignant')]
    private ?Enseignant $refEnseignant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumJury(): ?int
    {
        return $this->numJury;
    }

    public function setNumJury(int $numJury): self
    {
        $this->numJury = $numJury;

        return $this;
    }

    public function getDateSoutenance(): ?\DateTimeInterface
    {
        return $this->dateSoutenance;
    }

    public function setDateSoutenance(\DateTimeInterface $dateSoutenance): self
    {
        $this->dateSoutenance = $dateSoutenance;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getRefEnseignant(): ?Enseignant
    {
        return $this->refEnseignant;
    }

    public function setRefEnseignant(?Enseignant $refEnseignant): self
    {
        $this->refEnseignant = $refEnseignant;

        return $this;
    }
    public function __toString(){
      return $this->numJury;

    }
}
