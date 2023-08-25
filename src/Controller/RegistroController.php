<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Entity\Matricula;
use App\Form\RegistroalumnoType;
use App\Repository\CursoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController
{
    
    #[Route('/registro', name: 'app_registro')]
    public function index(Request $request, UserPasswordHasherInterface $passwordhash, EntityManagerInterface $entityManager ,CursoRepository $cursoRepository): Response
    {
        $alumno = new Alumno;
        $form = $this->createForm(RegistroalumnoType::class, $alumno);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $plaintextPassword = $form->get('password')->getData();

            $hashedPassword = $passwordhash->hashPassword(
                $alumno,
                $plaintextPassword
            );
            $alumno->setPassword($hashedPassword);
            $selectRol = $form->get('Seleccionrol')->getData();
            if ($selectRol === 'ROLE_USER' || $selectRol === 'ROLE_DELEGATE') {
                $alumno->setRoles([$selectRol]); // Asignar el rol al alumno
            }
            $entityManager->persist($alumno);
           
            $cursoIds = $form->get('Seleccioncursos')->getData();
            foreach($cursoIds as $cursoId){
                $curso = $cursoRepository->find($cursoId);
                if($curso){
                    $matricula = new Matricula();
                    $matricula->setIdAlumno($alumno);
                    $matricula->setIdCurso($curso);
                    $entityManager->persist($matricula);
                }
            }

            $entityManager->flush();
            return $this->redirectToRoute('app_registro');
        }
        return $this->render('registro/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
