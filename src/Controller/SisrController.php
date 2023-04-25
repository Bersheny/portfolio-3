<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/competences-sisr')]
class SisrController extends AbstractController
{
    #[Route('/', name: 'app_sisr_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/competences-sisr.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
