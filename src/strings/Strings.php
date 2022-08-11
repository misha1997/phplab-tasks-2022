<?php

namespace strings;

class Strings implements StringsInterface
{
    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }

    public function mirrorMultibyteString(string $input): string
    {
        $reversedTnputArray = array_reverse(mb_str_split($input));
        $reversedTnput = implode('', $reversedTnputArray);
        $reversedWords = array_reverse(mb_split(' ', $reversedTnput));
        return implode(' ', $reversedWords);
    }

    public function getBrandName(string $noun): string
    {
        if ($noun[0] == $noun[strlen($noun) - 1]) {
            return ucfirst($noun) . substr($noun, 1);
        } else {
            return 'The ' . ucfirst($noun);
        }
    }
}
