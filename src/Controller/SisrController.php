<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SisrController extends AbstractController
{
    #[Route('/competences-sisr', name: 'app_competences-sisr_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/competences-sisr.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
