<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditarmatriculaController extends VerificadorController
{
    #[Route('/editarmatricula', name: 'app_editarmatricula')]
    public function index(): Response
    {
        $this->verificarAcceso();
        return $this->render('editarmatricula/index.html.twig', [
            'controller_name' => 'EditarmatriculaController',
        ]);
    }
}
