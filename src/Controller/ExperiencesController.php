<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExperiencesController extends AbstractController
{
    #[Route('/experiences-professionnelles', name: 'app_experiences_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/experiences-professionnelles.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
