<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbKms;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datatrajet;

    /**
    *@ORM\OneToOne (targetEntity="App\Entity\Ville", cascade={"persist"})
    *@ORM\JoinColumn (nullable=true)
    */
    private Ville $ville_dep;
    /**
    *@ORM\OneToOne (targetEntity="App\Entity\Ville", cascade={"persist"})
    *@ORM\JoinColumn (nullable=true)
    */
    private Ville $ville_arrs;
    /**
    *@ORM\OneToOne (targetEntity="App\Entity\Personne", cascade={"persist"})
    *@ORM\JoinColumn (nullable=true)
    */
    private Personne $pers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbKms(): ?int
    {
        return $this->nbKms;
    }

    public function setNbKms(int $nbKms): self
    {
        $this->nbKms = $nbKms;

        return $this;
    }

    public function getDatatrajet(): ?\DateTimeInterface
    {
        return $this->datatrajet;
    }

    public function setDatatrajet(\DateTimeInterface $datatrajet): self
    {
        $this->datatrajet = $datatrajet;

        return $this;
    }

    public function getVilleDep(): ?Ville
    {
        return $this->ville_dep;
    }

    public function setVilleDep(?Ville $ville_dep): self
    {
        $this->ville_dep = $ville_dep;

        return $this;
    }

    public function getVilleArrs(): ?Ville
    {
        return $this->ville_arrs;
    }

    public function setVilleArrs(?Ville $ville_arrs): self
    {
        $this->ville_arrs = $ville_arrs;

        return $this;
    }

    public function getPers(): ?Personne
    {
        return $this->pers;
    }

    public function setPers(?Personne $pers): self
    {
        $this->pers = $pers;

        return $this;
    }
}
