<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{
    private const OPTIONS = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0',
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_AUTOREFERER => true,
        CURLOPT_HEADER => true
    ];

    /**
     * @param string $url
     * @return string
     * @throws \ErrorException
     */
    public function getContent(string $url): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt_array($ch, self::OPTIONS);

        $content = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header = substr($content, 0, $headerSize);

        if($headerSize != 200) {
            throw new \ErrorException('Data fetch error. Status code: ' . $headerSize);
        }

        if(strpos($header, 'windows-1251')) {
            $content = iconv('CP1251', mb_detect_encoding($content), $content);
        }

        curl_close($ch);

        return $content;
    }
}