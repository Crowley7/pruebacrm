<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $creditos = null;

    #[ORM\OneToMany(mappedBy: 'idCurso', targetEntity: Matricula::class, orphanRemoval: true)]
    private Collection $matricula;

    public function __construct()
    {
        $this->matricula = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCreditos(): ?int
    {
        return $this->creditos;
    }

    public function setCreditos(int $creditos): static
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * @return Collection<int, Matricula>
     */
    public function getMatricula(): Collection
    {
        return $this->matricula;
    }

    public function addMatricula(Matricula $matricula): static
    {
        if (!$this->matricula->contains($matricula)) {
            $this->matricula->add($matricula);
            $matricula->setIdCurso($this);
        }

        return $this;
    }

    public function removeMatricula(Matricula $matricula): static
    {
        if ($this->matricula->removeElement($matricula)) {
            // set the owning side to null (unless already changed)
            if ($matricula->getIdCurso() === $this) {
                $matricula->setIdCurso(null);
            }
        }

        return $this;
    }
}
