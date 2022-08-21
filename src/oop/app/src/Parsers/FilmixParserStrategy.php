<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $movie = new Movie();
        
        preg_match('/<h1 class="name"[^>]*>(.*?)<\/h1>/s', $siteContent, $title);
        preg_match('/src="([^"]*)" class=[\'|"]poster poster-tooltip[\'|"] /i', $siteContent, $poster);
        preg_match('/<div class="full-story"[^>]*>(.*?)<\/div>/s', $siteContent, $description);

        if(!empty($title)) {
            $movie->setTitle($title[1]);
        }
        if(!empty($poster)) {
            $movie->setPoster($poster[1]);
        }
        if(!empty($description)) {
            $movie->setDescription($description[1]);
        }

        return $movie;
    }
}