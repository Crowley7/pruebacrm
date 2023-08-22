<?php

namespace App\Entity;

use App\Repository\MatriculaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatriculaRepository::class)]
class Matricula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'matricula')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Alumno $idAlumno = null;

    #[ORM\ManyToOne(inversedBy: 'matricula')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Curso $idCurso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAlumno(): ?Alumno
    {
        return $this->idAlumno;
    }

    public function setIdAlumno(?Alumno $idAlumno): static
    {
        $this->idAlumno = $idAlumno;

        return $this;
    }

    public function getIdCurso(): ?Curso
    {
        return $this->idCurso;
    }

    public function setIdCurso(?Curso $idCurso): static
    {
        $this->idCurso = $idCurso;

        return $this;
    }
}
