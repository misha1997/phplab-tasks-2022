<?php

namespace src\oop\app\src\Parsers;

use Symfony\Component\DomCrawler\Crawler;
use src\oop\app\src\Models\Movie;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    private Movie $movie;
    private Crawler $crawler;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
        $this->crawler = new Crawler();
    }

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $html = new $this->crawler($siteContent);

        $this->movie->setTitle($html->filter('h1')->text());
        $this->movie->setPoster($html->filter('a[data-fancybox="gallery"]')->attr('href'));
        $this->movie->setDescription($html->filter('div#fdesc')->text());

        return $this->movie;
    }
}