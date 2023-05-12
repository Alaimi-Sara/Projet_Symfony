<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_Ens = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_Ens = null;

    #[ORM\OneToMany(mappedBy: 'refEnseignant', targetEntity: Soutenance::class)]
    private Collection $refEnseignant;

    public function __construct()
    {
        $this->refEnseignant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNomEns(): ?string
    {
        return $this->nom_Ens;
    }

    public function setNomEns(string $nom_Ens): self
    {
        $this->nom_Ens = $nom_Ens;

        return $this;
    }

    public function getPrenomEns(): ?string
    {
        return $this->prenom_Ens;
    }

    public function setPrenomEns(string $prenom_Ens): self
    {
        $this->prenom_Ens = $prenom_Ens;

        return $this;
    }

    /**
     * @return Collection<int, Soutenance>
     */
    public function getRefEnseignant(): Collection
    {
        return $this->refEnseignant;
    }

    public function addRefEnseignant(Soutenance $refEnseignant): self
    {
        if (!$this->refEnseignant->contains($refEnseignant)) {
            $this->refEnseignant->add($refEnseignant);
            $refEnseignant->setRefEnseignant($this);
        }

        return $this;
    }

    public function removeRefEnseignant(Soutenance $refEnseignant): self
    {
        if ($this->refEnseignant->removeElement($refEnseignant)) {
            // set the owning side to null (unless already changed)
            if ($refEnseignant->getRefEnseignant() === $this) {
                $refEnseignant->setRefEnseignant(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->matricule;

    }
}
