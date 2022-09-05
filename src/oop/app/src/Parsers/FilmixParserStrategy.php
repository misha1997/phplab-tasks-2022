<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    private Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        preg_match('/<h1 class="name"[^>]*>(.*?)<\/h1>/s', $siteContent, $title);
        preg_match('/src="([^"]*)" class=[\'|"]poster poster-tooltip[\'|"] /i', $siteContent, $poster);
        preg_match('/<div class="full-story"[^>]*>(.*?)<\/div>/s', $siteContent, $description);

        if (!empty($title)) {
            $this->movie->setTitle($title[1]);
        }
        if (!empty($poster)) {
            $this->movie->setPoster($poster[1]);
        }
        if (!empty($description)) {
            $this->movie->setDescription($description[1]);
        }

        return $this->movie;
    }
}