<?php

namespace App\Entity;

use App\Repository\CategorieAdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieAdherentRepository::class)]
class CategorieAdherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $annee = null;

    #[ORM\OneToMany(mappedBy: 'idCategorieAdherent', targetEntity: Adherent::class)]
    private Collection $idAdherent;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $idCatehorie = null;

    public function __construct()
    {
        $this->idAdherent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection<int, Adherent>
     */
    public function getIdAdherent(): Collection
    {
        return $this->idAdherent;
    }

    public function addIdAdherent(Adherent $idAdherent): self
    {
        if (!$this->idAdherent->contains($idAdherent)) {
            $this->idAdherent->add($idAdherent);
            $idAdherent->setIdCategorieAdherent($this);
        }

        return $this;
    }

    public function removeIdAdherent(Adherent $idAdherent): self
    {
        if ($this->idAdherent->removeElement($idAdherent)) {
            // set the owning side to null (unless already changed)
            if ($idAdherent->getIdCategorieAdherent() === $this) {
                $idAdherent->setIdCategorieAdherent(null);
            }
        }

        return $this;
    }

    public function getIdCatehorie(): ?Categorie
    {
        return $this->idCatehorie;
    }

    public function setIdCatehorie(?Categorie $idCatehorie): self
    {
        $this->idCatehorie = $idCatehorie;

        return $this;
    }
}
