<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Alumno;
use Symfony\Component\Security\Core\User\UserInterface;

class PerfilController extends VerificadorController
{
    #[Route('/perfil', name: 'app_perfil')]
    public function index(UserInterface $user): Response
    {
        $this->verificarAcceso();
       
        
       
        $alumno = $this->getUser();

        return $this->render('perfil/index.html.twig', [
            'alumno' => $alumno,
           
        ]);
    }
}
