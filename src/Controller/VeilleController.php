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
        $simpleXmlElement1 = simplexml_load_file('https://aws.amazon.com/fr/blogs/machine-learning/feed/');
        $simpleXmlElement2 = simplexml_load_file('https://blogs.nvidia.com/feed/');

        $items1 = $this->processRssItems($simpleXmlElement1->channel->item);
        $items2 = $this->processRssItems($simpleXmlElement2->channel->item);

        return $this->render('default/veille-technologique.html.twig', [
            'items1' => $items1,
            'items2' => $items2,
        ]);
    }

    private function processRssItems($rssItems)
    {
        $processedItems = [];

        foreach ($rssItems as $item) {
            // Extract and format the publication date
            $datePublication = date_create_from_format('D, d M Y H:i:s O', (string)$item->pubDate);
            $dateFormatted = $datePublication ? $datePublication->format('j F Y') : '';

            $enclosureUrl = (string)$item->enclosure['url'];

            // Attempt to get the author from <author> or <dc:creator>
            $author = (string)$item->author;
            if (empty($author)) {
                $dc = $item->children('http://purl.org/dc/elements/1.1/');
                $author = (string)$dc->creator;
            }

            $processedItems[] = [
                'title' => (string)$item->title,
                'link' => (string)$item->link,
                'pubDate' => $dateFormatted, // Use formatted date
                'author' => $author,
                'description' => (string)$item->description,
                'enclosureUrl' => $enclosureUrl
            ];
        }

        return $processedItems;
    }
}
