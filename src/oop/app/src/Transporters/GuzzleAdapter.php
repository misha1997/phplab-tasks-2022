<?php

namespace src\oop\app\src\Transporters;

class GuzzleAdapter implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     * @throws \ErrorException
     */
    public function getContent(string $url): string
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);
        $content = $response->getBody()->getContents();

        $statusCode = $response->getStatusCode();

        if($statusCode != 200) {
            throw new \ErrorException('Data fetch error. Status code: ' . $statusCode);
        }

        if(strpos($response->getHeader('content-type')[0], 'windows-1251')) {
            $content = iconv('CP1251', mb_detect_encoding($content), $content);
        }

        return $content;
    }
}