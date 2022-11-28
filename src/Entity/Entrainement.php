<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(length: 255)]
    private ?string $terrain = null;

    #[ORM\ManyToMany(targetEntity: StaffPersonnel::class)]
    private Collection $idStaffPerdonnel;

    #[ORM\ManyToMany(targetEntity: Terrain::class)]
    private Collection $idTerrain;

    #[ORM\ManyToMany(targetEntity: Categorie::class)]
    private Collection $idCategorie;

    public function __construct()
    {
        $this->idStaffPerdonnel = new ArrayCollection();
        $this->idTerrain = new ArrayCollection();
        $this->idCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(string $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    /**
     * @return Collection<int, StaffPersonnel>
     */
    public function getIdStaffPerdonnel(): Collection
    {
        return $this->idStaffPerdonnel;
    }

    public function addIdStaffPerdonnel(StaffPersonnel $idStaffPerdonnel): self
    {
        if (!$this->idStaffPerdonnel->contains($idStaffPerdonnel)) {
            $this->idStaffPerdonnel->add($idStaffPerdonnel);
        }

        return $this;
    }

    public function removeIdStaffPerdonnel(StaffPersonnel $idStaffPerdonnel): self
    {
        $this->idStaffPerdonnel->removeElement($idStaffPerdonnel);

        return $this;
    }

    /**
     * @return Collection<int, Terrain>
     */
    public function getIdTerrain(): Collection
    {
        return $this->idTerrain;
    }

    public function addIdTerrain(Terrain $idTerrain): self
    {
        if (!$this->idTerrain->contains($idTerrain)) {
            $this->idTerrain->add($idTerrain);
        }

        return $this;
    }

    public function removeIdTerrain(Terrain $idTerrain): self
    {
        $this->idTerrain->removeElement($idTerrain);

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getIdCategorie(): Collection
    {
        return $this->idCategorie;
    }

    public function addIdCategorie(Categorie $idCategorie): self
    {
        if (!$this->idCategorie->contains($idCategorie)) {
            $this->idCategorie->add($idCategorie);
        }

        return $this;
    }

    public function removeIdCategorie(Categorie $idCategorie): self
    {
        $this->idCategorie->removeElement($idCategorie);

        return $this;
    }
}
