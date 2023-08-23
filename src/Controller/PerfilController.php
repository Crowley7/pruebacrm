<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Alumno;
use Symfony\Component\Security\Core\User\UserInterface;

class PerfilController extends AbstractController
{
    #[Route('/perfil', name: 'app_perfil')]
    public function index(UserInterface $user): Response
    {
       
        
       
        $alumno = $this->getUser();

        return $this->render('perfil/index.html.twig', [
            'alumno' => $alumno,
           
        ]);
    }
}
