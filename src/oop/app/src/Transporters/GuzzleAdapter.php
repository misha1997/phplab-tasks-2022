<?php

namespace src\oop\app\src\Transporters;

use \GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return string
     * @throws \ErrorException
     */
    public function getContent(string $url): string
    {
        $response = $this->client->get($url);
        $content = $response->getBody()->getContents();

        $statusCode = $response->getStatusCode();

        if ($statusCode != 200) {
            throw new \ErrorException('Data fetch error. Status code: ' . $statusCode);
        }

        if (strpos($response->getHeader('content-type')[0], 'windows-1251')) {
            $content = iconv('CP1251', mb_detect_encoding($content), $content);
        }

        return $content;
    }
}