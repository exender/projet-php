<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresRepository::class)
 */
class Offres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $missionend;

    /**
     * @ORM\ManyToOne(targetEntity=Contrats::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $contrat;

    /**
     * @ORM\ManyToOne(targetEntity=Typecontrats::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $typecontrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    public function getMissionend(): ?\DateTimeInterface
    {
        return $this->missionend;
    }

    public function setMissionend(?\DateTimeInterface $missionend): self
    {
        $this->missionend = $missionend;

        return $this;
    }

    public function getContrat(): ?Contrats
    {
        return $this->contrat;
    }

    public function setContrat(?Contrats $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getTypecontrat(): ?Typecontrats
    {
        return $this->typecontrat;
    }

    public function setTypecontrat(?Typecontrats $typecontrat): self
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }
}
