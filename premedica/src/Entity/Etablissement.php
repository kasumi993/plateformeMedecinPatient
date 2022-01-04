<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $telephone;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\OneToMany(mappedBy: 'idEtablissement', targetEntity: Medecin::class)]
    private $medecins;

    #[ORM\OneToMany(mappedBy: 'idEtablissement', targetEntity: Pharmacien::class)]
    private $pharmaciens;

    public function __construct()
    {
        $this->medecins = new ArrayCollection();
        $this->pharmaciens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Medecin[]
     */
    public function getMedecins(): Collection
    {
        return $this->medecins;
    }

    public function addMedecin(Medecin $medecin): self
    {
        if (!$this->medecins->contains($medecin)) {
            $this->medecins[] = $medecin;
            $medecin->setIdEtablissement($this);
        }

        return $this;
    }

    public function removeMedecin(Medecin $medecin): self
    {
        if ($this->medecins->removeElement($medecin)) {
            // set the owning side to null (unless already changed)
            if ($medecin->getIdEtablissement() === $this) {
                $medecin->setIdEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pharmacien[]
     */
    public function getPharmaciens(): Collection
    {
        return $this->pharmaciens;
    }

    public function addPharmacien(Pharmacien $pharmacien): self
    {
        if (!$this->pharmaciens->contains($pharmacien)) {
            $this->pharmaciens[] = $pharmacien;
            $pharmacien->setIdEtablissement($this);
        }

        return $this;
    }

    public function removePharmacien(Pharmacien $pharmacien): self
    {
        if ($this->pharmaciens->removeElement($pharmacien)) {
            // set the owning side to null (unless already changed)
            if ($pharmacien->getIdEtablissement() === $this) {
                $pharmacien->setIdEtablissement(null);
            }
        }

        return $this;
    }

}
