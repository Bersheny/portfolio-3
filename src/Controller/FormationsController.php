<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationsController extends AbstractController
{
    #[Route('/formations', name: 'app_formations_index')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('default/formations.html.twig', [
            'controller_name' => $translator->trans('Hello!'),
        ]);
    }
}
