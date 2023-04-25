<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'employe_id', targetEntity: Horaires::class, orphanRemoval: true)]
    private Collection $employe_horaires;

    public function __construct()
    {
        $this->employe_horaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Horaires>
     */
    public function getEmployeHoraires(): Collection
    {
        return $this->employe_horaires;
    }

    public function addEmployeHoraire(Horaires $employeHoraire): self
    {
        if (!$this->employe_horaires->contains($employeHoraire)) {
            $this->employe_horaires->add($employeHoraire);
            $employeHoraire->setEmployeId($this);
        }

        return $this;
    }

    public function removeEmployeHoraire(Horaires $employeHoraire): self
    {
        if ($this->employe_horaires->removeElement($employeHoraire)) {
            // set the owning side to null (unless already changed)
            if ($employeHoraire->getEmployeId() === $this) {
                $employeHoraire->setEmployeId(null);
            }
        }

        return $this;
    }
}
