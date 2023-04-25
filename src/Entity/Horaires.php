<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $semaine = null;

    #[ORM\Column(nullable: true)]
    private ?array $jour0 = [];

    #[ORM\Column(nullable: true)]
    private ?array $jour1 = [];

    #[ORM\Column(nullable: true)]
    private ?array $jour2 = [];

    #[ORM\Column(nullable: true)]
    private ?array $jour3 = [];

    #[ORM\Column(nullable: true)]
    private ?array $jour4 = [];

    #[ORM\ManyToOne(inversedBy: 'employe_horaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $employe_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeId(): ?int
    {
        return $this->employe_id;
    }

    public function setEmployeId(int $employe_id): self
    {
        $this->employe_id = $employe_id;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(int $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getJour0(): array
    {
        return $this->jour0;
    }

    public function setJour0(?array $jour0): self
    {
        $this->jour0 = $jour0;

        return $this;
    }

    public function getJour1(): array
    {
        return $this->jour1;
    }

    public function setJour1(?array $jour1): self
    {
        $this->jour1 = $jour1;

        return $this;
    }

    public function getJour2(): array
    {
        return $this->jour2;
    }

    public function setJour2(?array $jour2): self
    {
        $this->jour2 = $jour2;

        return $this;
    }

    public function getJour3(): array
    {
        return $this->jour3;
    }

    public function setJour3(?array $jour3): self
    {
        $this->jour3 = $jour3;

        return $this;
    }

    public function getJour4(): array
    {
        return $this->jour4;
    }

    public function setJour4(?array $jour4): self
    {
        $this->jour4 = $jour4;

        return $this;
    }

    public function getAllHoraires(): array {
        return [
            'annee' => $this->annee,
            'semaine' => $this->semaine,
            'jour0' => $this->jour0,
            'jour1' => $this->jour1,
            'jour2' => $this->jour2, 
            'jour3' => $this->jour3, 
            'jour4' => $this->jour4
        ];
    }
}
