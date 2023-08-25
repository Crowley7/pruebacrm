<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerfilController extends VerificadorController
{
    #[Route('/perfil', name: 'app_perfil')]
    public function index(): Response
    {
        $this->verificarAcceso();
       
        $alumno = $this->getUser();

        return $this->render('perfil/index.html.twig', [
            'alumno' => $alumno,
           
        ]);
    }
}
