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
        $simpleXmlElement1 = simplexml_load_file('https://openai.com/blog/rss.xml');
        $simpleXmlElement2 = simplexml_load_file('https://bair.berkeley.edu/blog/feed.xml');

        //dump(print_r($simpleXmlElement->channel->item, true));
        //dump($simpleXmlElement->channel->item);
        //dump($simpleXmlElement2->channel->item);

        $items1 = json_decode(json_encode($simpleXmlElement1->channel->item), true);
        $items2 = json_decode(json_encode($simpleXmlElement2->channel->item), true);
        $mergedItems = array_merge($items1, $items2);

        //$datePublication = date('d/m/Y', $simpleXmlElement->channel->item->pubDate);

        return $this->render('default/veille-technologique.html.twig', [
            'items' => $mergedItems,
        ]);
    }
}
