<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class VerificadorController extends AbstractController
{
    
    protected function verificarAcceso():void {
        if(!$this->isGranted('ROLE_USER')){
           throw new AccessDeniedException();
        }
    }
}
