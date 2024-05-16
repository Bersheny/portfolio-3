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
        // $simpleXmlElement = simplexml_load_file('https://openai.com/blog/rss.xml');
        $simpleXmlElement = simplexml_load_file('https://blogs.nvidia.com/feed/');
        // $simpleXmlElement = simplexml_load_file('https://blog.google/technology/ai/rss/');

        //dump(print_r($simpleXmlElement->channel->item, true));
        dump($simpleXmlElement->channel->item);

        $datePublication = date('d/m/Y', strtotime((string) $simpleXmlElement->channel->item->pubDate));


        return $this->render('default/veille-technologique.html.twig', array(
            'items' => $simpleXmlElement->channel->item,
        ));
    }
}
