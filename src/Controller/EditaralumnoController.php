<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class EditaralumnoController extends VerificadorController
{
    #[Route('/editaralumno', name: 'app_editaralumno')]
    public function index(UserInterface $user): Response
    {
        $this->verificarAcceso();
        return $this->render('editaralumno/index.html.twig', [
            'controller_name' => 'EditaralumnoController',
        ]);
    }
}
