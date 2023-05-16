<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VeilleController extends AbstractController
{
    #[Route('/veille-technologique', name: 'app_veille_index')]
    public function index(TranslatorInterface $translator): Response
    {
        $rss = simplexml_load_file('https://openai.com/blog/rss.xml');

        return $this->render('default/veille-technologique.html.twig', array(
            'rss' => $rss,
        ));
    }
}
