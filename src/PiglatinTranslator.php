<?php namespace src\PiglatinTranslator;

class PiglatinTranslator
{

    protected static $consonants = [
        'b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','z'
    ];

    public function translate($word)
    {

        $translation = '';
        $words = [];

        if (preg_match('/\s/', $word)) {
            $words = explode(' ', $word);
        } else {
            $translation = $this->translateWord($word);
        }

        foreach ($words as $word) {
            $translation .= $this->translateWord($word) . ' ';
        }

        return trim($translation);

    }

    public function translateWord($word)
    {
        $translation = '';
        $suffix = '';
        $counter = 0;
        $wordArray = str_split($word);

        // if it starts with consonant sound
        if (in_array($wordArray[$counter], static::$consonants)) {
            while (in_array($wordArray[$counter], static::$consonants)) {
                $suffix .= $wordArray[$counter];
                $counter++;
            }
            $suffix .= 'ay';
            $translation .= substr($word, $counter);
            $translation .= $suffix;
        } else {
            // or if it starts with vowel(s)
            $suffix .= 'way';
            $translation .= $word . $suffix;
        }

        return $translation;
    }
}
