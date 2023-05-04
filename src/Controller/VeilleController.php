<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VeilleController extends AbstractController
{
    #[Route('/veille-technologique', name: 'app_slam_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/veille-technologique.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
