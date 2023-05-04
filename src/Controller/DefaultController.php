<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }

    #[Route('/cvd', name: 'app_cvd_index')]
    public function cvd(TranslatorInterface $translator): Response
    {
        return $this->render('default/cv.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}