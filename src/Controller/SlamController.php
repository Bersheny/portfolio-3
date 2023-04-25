<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/competences-slam')]
class SlamController extends AbstractController
{
    #[Route('/', name: 'app_slam_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/competences-slam.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
