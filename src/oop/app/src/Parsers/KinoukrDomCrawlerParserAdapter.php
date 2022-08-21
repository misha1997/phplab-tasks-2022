<?php

namespace src\oop\app\src\Parsers;

use Symfony\Component\DomCrawler\Crawler;
use src\oop\app\src\Models\Movie;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $crawler = new Crawler($siteContent);
        $movie = new Movie();

        $movie->setTitle($crawler->filter('h1')->text());
        $movie->setPoster($crawler->filter('a[data-fancybox="gallery"]')->attr('href'));
        $movie->setDescription($crawler->filter('div#fdesc')->text());

        return $movie;
    }
}