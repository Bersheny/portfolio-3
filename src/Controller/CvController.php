<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
