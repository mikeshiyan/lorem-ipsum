<?php

use PHPUnit\Framework\TestCase;
use Shiyan\LoremIpsum\LoremIpsum;

class LoremIpsumTest extends TestCase {

  public function testCallStatic() {
    $expected = [
      'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
      ' ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull',
      'amco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehende',
      'rit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaec',
      'at cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    ];

    $this->assertSame($expected, LoremIpsum::str_split(89));
    $this->assertSame(445, LoremIpsum::strlen());
  }

  public function testGetSentences() {
    $sentences = [
      'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
      'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
      'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    ];

    $this->assertSame($sentences, LoremIpsum::getSentences());
  }

  public function testGetSentence() {
    $sentence = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

    $this->assertSame($sentence, LoremIpsum::getSentence());
    $this->assertSame($sentence, LoremIpsum::getSentence(4));
    $this->assertSame($sentence, LoremIpsum::getSentence(4 * 67));
    $this->assertSame($sentence, LoremIpsum::getSentence(-4));
    $this->assertSame($sentence, LoremIpsum::getSentence(-4 * 100));

    $sentence = 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

    $this->assertSame($sentence, LoremIpsum::getSentence(3));
    $this->assertSame($sentence, LoremIpsum::getSentence(3 + 4 * 1081));
    $this->assertSame($sentence, LoremIpsum::getSentence(-1));
    $this->assertSame($sentence, LoremIpsum::getSentence(-1 - 4 * 83));
  }

  public function testGetWords() {
    $words = [
      'Lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing',
      'elit', 'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore',
      'et', 'dolore', 'magna', 'aliqua', 'Ut', 'enim', 'ad', 'minim', 'veniam',
      'quis', 'nostrud', 'exercitation', 'ullamco', 'laboris', 'nisi', 'ut',
      'aliquip', 'ex', 'ea', 'commodo', 'consequat', 'Duis', 'aute', 'irure',
      'dolor', 'in', 'reprehenderit', 'in', 'voluptate', 'velit', 'esse',
      'cillum', 'dolore', 'eu', 'fugiat', 'nulla', 'pariatur', 'Excepteur',
      'sint', 'occaecat', 'cupidatat', 'non', 'proident', 'sunt', 'in', 'culpa',
      'qui', 'officia', 'deserunt', 'mollit', 'anim', 'id', 'est', 'laborum',
    ];

    $this->assertSame($words, LoremIpsum::getWords());
  }

  public function testGetWord() {
    $this->assertSame('Lorem', LoremIpsum::getWord());
    $this->assertSame('laborum', LoremIpsum::getWord(68));
    $this->assertSame('Lorem', LoremIpsum::getWord(69));
    $this->assertSame('laborum', LoremIpsum::getWord(69 * 11 - 1));
    $this->assertSame('Lorem', LoremIpsum::getWord(-69));
    $this->assertSame('laborum', LoremIpsum::getWord(-69 * 53 - 1));
  }

}
