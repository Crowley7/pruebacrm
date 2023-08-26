<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EditaralumnoType;
use App\Repository\AlumnoRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class EditaralumnoController extends VerificadorController
{
    #[Route('/editaralumno', name: 'app_editaralumno', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, AlumnoRepository $alumnoRepository, SessionInterface $session, TokenStorageInterface $token): Response
    {
        
        $this->verificarAcceso();
        $alumno = $this->getUser();
        $alumno_bd = $alumnoRepository->findOneBy([
                'dni' => $alumno->getUserIdentifier(),
        ]);

        $roles = $alumno->getRoles();
        $defaultRol = in_array('ROLE_DELEGATE', $roles) ? 'ROLE_DELEGATE' : 'ROLE_USUARIO';
        $form = $this->createForm(EditaralumnoType::class, $alumno,[
            'default_rol' => $defaultRol,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $selectRol = $form->get('Seleccionrol')->getData();
            $alumno_bd->setRoles([$selectRol]);
            $entityManager->flush();

            $session->invalidate();

            $firewall = 'main';

            $newtoken = new UsernamePasswordToken($alumno, $firewall,$alumno->getRoles());
            $token->setToken($newtoken);
            return $this->redirectToRoute('app_perfil');
        }

        return $this->render('editaralumno/index.html.twig', [
            'form' => $form,        
        ]);
    }
}
