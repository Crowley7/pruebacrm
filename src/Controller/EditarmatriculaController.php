<?php

namespace App\Controller;

use App\Entity\Curso;
use App\Entity\Alumno;
use App\Entity\Matricula;
use App\Repository\AlumnoRepository;
use App\Repository\CursoRepository;
use App\Repository\MatriculaRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/editarmatricula')]
class EditarmatriculaController extends VerificadorController
{
    #[Route('/', name: 'app_matricula_index', methods:['GET'])]
    public function index(Request $request, CursoRepository $cursos, AlumnoRepository $alumnos): Response
    {
        $this->verificarAcceso();
        $user = $this->getUser();
        $alumno = $alumnos->findOneBy([
            'dni' => $user->getUserIdentifier(),
        ]);

        
        
        return $this->render('editarmatricula/index.html.twig', [
            'cursos' => $cursos->findAll(),
            'alumno' => $alumno,
        ]);
    }

    #[Route('/', name: 'app_eliminarmatricula', methods:['GET'])]
    public function delete(CursoRepository $cursos, UserInterface $alumno): Response
    {
        $this->verificarAcceso();
        return $this->render('editarmatricula/index.html.twig', [
            'cursos' => $cursos,
            'alumno' => $alumno,
        ]);
    }

    #[Route('/', name: 'app_nuevamatricula', methods:['GET'])]
    public function new(CursoRepository $cursos, UserInterface $alumno): Response
    {
        $this->verificarAcceso();
        return $this->render('editarmatricula/index.html.twig', [
            'cursos' => $cursos,
            'alumno' => $alumno,
        ]);
    }
}
