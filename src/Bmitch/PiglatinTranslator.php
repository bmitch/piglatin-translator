<?php

namespace Bmitch;

class PiglatinTranslator
{
    protected static $consonants = [
        'b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','z'
    ];

    protected static $punctuationMarks = [
        '.'
    ];

    public function translate($phrase)
    {

        $translation = '';
        $wordsArray  = [];
        $wordsArray  = explode(' ', $phrase);

        foreach ($wordsArray as $word) {
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
        $savedPunctuationMark = '';
        // if it has a punctuation mark on the end
        if (substr($word, -1) == static::$punctuationMarks) {
            $savedPunctuationMark = '.';
        }

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

        $translation .= $savedPunctuationMark;

        return $translation;
    }
}
