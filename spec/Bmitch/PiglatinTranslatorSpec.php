<?php

namespace spec\Bmitch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PiglatinTranslatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bmitch\PiglatinTranslator');
    }

	function it_translates_the_word_duck()
    {
        $this->translate('duck')->shouldReturn('uckday');
    }

    function it_translates_the_word_egg()
    {
        $this->translate('egg')->shouldReturn('eggway');
    }

    function it_translates_the_word_inbox()
    {
        $this->translate('inbox')->shouldReturn('inboxway');
    }

    function it_translates_the_word_eight()
    {
        $this->translate('eight')->shouldReturn('eightway');
    }

    function it_translates_the_word_I()
    {
        $this->translate('I')->shouldReturn('Iway');
    }

    function it_translates_the_phrase_hello_world()
    {
        $this->translate('hello world')->shouldReturn('ellohay orldway');
    }

    function it_translates_the_phrase_one_two_three_four_five()
    {
        $this->translate('one two three four five')->shouldReturn('oneway otway eethray ourfay ivefay');
    }

    function it_translates_the_phrase_the_quick_brown_fox_jumps_over_the_lazy_dog()
    {
        $this->translate('the quick brown fox jumps over the lazy dog')->shouldReturn('ethay uickqay ownbray oxfay umpsjay overway ethay azylay ogday');
    }

    function it_translates_the_phrase_over_the_city_in_an_airplane()
    {
        $this->translate('over the city in an airplane')->shouldReturn('overway ethay itycay inway anway airplaneway');
    }

    function it_translates_a_phrase_with_a_period_on_the_end_and_last_word_vowel_sound()
    {
        $this->translate('over the city in an airplane.')->shouldReturn('overway ethay itycay inway anway airplaneway.');
    }

    function it_translates_a_phrase_with_a_period_on_the_end_and_last_word_consonant_sound()
    {
        $this->translate('he sits behind his microphone.')->shouldReturn('ehay itssay ehindbay ishay icrophonemay.');
    }

    function it_handles_a_comma_after_a_word_with_a_consonant_sound()
    {
        $this->translate('leo and capricorn, too.')->shouldReturn('eolay andway apricorncay, ootay.');
    }
    
    function it_handles_a_comma_after_a_word_with_a_vowel_sound()
    {
        $this->translate('oh, fantasy world')->shouldReturn('ohway, antasyfay orldway');
    }

    function it_handles_a_question_mark_after_a_word_with_a_consonant_sound()
    {
        $this->translate('oh, fantasy world')->shouldReturn('ohway, antasyfay orldway');
    }

    function it_handles_a_question_mark_after_a_word_with_a_vowel_sound()
    {
        $this->translate('are you experienced?')->shouldReturn('areway youway experiencedway?');
    }

    function it_handles_a_sentence_with_a_comma_and_a_period()
    {
        $this->translate('one, two and three.')->shouldReturn('oneway, otway andway eethray.');
    }

}
