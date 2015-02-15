<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PiglatinTranslatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PiglatinTranslator');
    }

    function it_translates_the_word_pig()
    {
        $this->translate('pig')->shouldReturn('igpay');
    }

    function it_translates_the_word_banana()
    {
        $this->translate('banana')->shouldReturn('ananabay');
    }

    function it_translates_the_word_trash()
    {
        $this->translate('trash')->shouldReturn('ashtray');
    }

    function it_translates_the_word_happy()
    {
        $this->translate('happy')->shouldReturn('appyhay');
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
}
