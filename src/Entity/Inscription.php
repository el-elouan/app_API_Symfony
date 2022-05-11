<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    *@ORM\OneToOne(targetEntity="App\Entity\Personne", cascade={"persist"})
    *@ORM\JoinColumn(nullable=true)
    */
    private Personne $pers;
    /**
    *@ORM\OneToOne(targetEntity="App\Entity\trajet", cascade={"persist"})
    *@ORM\JoinColumn(nullable=true)
    */
    private Trajet $trajet;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTrajet(): ?trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }
}
