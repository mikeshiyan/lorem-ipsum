# Lorem Ipsum

[![Build Status](https://travis-ci.org/mikeshiyan/lorem-ipsum.svg?branch=master)](https://travis-ci.org/mikeshiyan/lorem-ipsum)

PHP class with a lot of static methods to manipulate the _Lorem Ipsum_ string in
various ways.

Can be used as a [Composer](https://getcomposer.org) library.

## Requirements

* PHP &ge; 5.3 (PHP 7.* is recommended)

## Installation

To add this library to your Composer project:
```
composer require shiyan/lorem-ipsum
```

## Usage

```
use Shiyan\LoremIpsum\LoremIpsum;

// Echo the whole Lorem Ipsum string.
echo LoremIpsum::THE_STRING . "\n\n";

// Get the 4 Lorem Ipsum sentences with:
$sentences = LoremIpsum::getSentences();
// Or get a specific sentence with:
$sentence = LoremIpsum::getSentence(32);

// Do the same with just words:
$words = LoremIpsum::getWords();
$word = LoremIpsum::getWord(1024);

// Have fun supplying any built-in or user-defined function as a static method
// to the class. The Lorem Ipsum string will be prepended to the argument list:
echo LoremIpsum::str_shuffle() . "\n\n";
echo LoremIpsum::strtr(array("a" => "å", "o" => "ö", "." => "¿")) . "\n\n";
echo LoremIpsum::strrev() . "\n\n";
echo LoremIpsum::str_repeat(5) . "\n\n";
echo LoremIpsum::strtoupper() . "\n\n";
```
