<?php

namespace App\Controller;

use App\Entity\Matricula;
use App\Repository\AlumnoRepository;
use App\Repository\CursoRepository;
use App\Repository\MatriculaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/editarmatricula')]
class EditarmatriculaController extends VerificadorController
{
    #[Route('/', name: 'app_matricula_index', methods:['GET'])]
    public function index(CursoRepository $cursos, AlumnoRepository $alumnos): Response
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

    #[Route('/eliminarmatricula/{id}', name: 'app_eliminarmatricula', methods:['GET'])]
    public function delete($id ,EntityManagerInterface $entityManager, MatriculaRepository $matriculas): RedirectResponse
    {
        $this->verificarAcceso();
        $matricula = $matriculas->find($id);
        if(!$matricula || $matricula->getIdAlumno() !== $this->getUser()){
            throw $this->createNotFoundException('Matricula no encontrada');
        }
        $entityManager->remove($matricula);
        $entityManager->flush();
       return $this->redirectToRoute('app_matricula_index');
    }

    #[Route('/nuevamatricula/{id}', name: 'app_nuevamatricula', methods:['GET'])]
    public function new($id, CursoRepository $cursos,UserInterface $alumno, EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->verificarAcceso();
        $curso = $cursos->find($id);
        if($curso){
            $matricula = new Matricula;
            $matricula->setIdAlumno($alumno);
            $matricula->setIdCurso($curso);
            $entityManager->persist($matricula);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_matricula_index');     
    }
}
