<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'app_projets_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/projets.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
