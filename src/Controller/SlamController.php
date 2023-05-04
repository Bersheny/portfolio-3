<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SlamController extends AbstractController
{
    #[Route('/competences-slam', name: 'app_competences-slam_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/competences-slam.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
