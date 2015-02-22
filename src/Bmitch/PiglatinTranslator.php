<?php

namespace Bmitch;

class PiglatinTranslator
{
    protected static $consonants = [
        'b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','z',
        'B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Z'
    ];

    protected static $vowels = [
        'a','e','i','o','u','y',
        'A','E','I','O','U','Y',
    ];

    protected static $punctuationMarks = [
        '.'
    ];

    public function translate($phrase)
    {
        $translation = '';
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

        if ($this->startsWithAVowel($word)) {
            $suffix .= 'way';
            $translation .= $word . $suffix;
        } else {
            while (in_array($wordArray[$counter], static::$consonants)) {
                $suffix .= $wordArray[$counter];
                $counter++;
            }
            $suffix .= 'ay';
            $translation .= substr($word, $counter);
            $translation .= $suffix;
        }

        if ($this->containsPunctuationMark($translation)) {
            $translation = $this->movePunctuationMarkToEndOfWord($translation);
        }

        return $translation;
    }

    private function movePunctuationMarkToEndOfWord($translation)
    {
        $translation = str_replace('.', '', $translation);
        $translation .= ".";
        return $translation;
    }

    private function containsPunctuationMark($word)
    {
        $containsPuntuationMark = false;
        foreach (str_split($word) as $letter) {
            if (in_array($letter, static::$punctuationMarks)) {
                $containsPuntuationMark = true;
            }
        }
        return $containsPuntuationMark;
    }

    private function startsWithAVowel($word)
    {
        return in_array(str_split($word)[0], static::$vowels);
    }
}
