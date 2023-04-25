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
        return $this->render('default/cv.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }

    #[Route('/cv', name: 'app_default_cv')]
    public function cv(TranslatorInterface $translator): Response
    {
        return $this->render('default/cv.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}

#[Route('/cv')]
class CvController extends AbstractController
{
    #[Route('/', name: 'app_cv_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/cv.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}