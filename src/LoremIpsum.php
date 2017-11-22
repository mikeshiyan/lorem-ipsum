<?php

namespace Shiyan\LoremIpsum;

/**
 * Manipulates the Lorem Ipsum string in various ways.
 */
class LoremIpsum {

  /**
   * The original Lorem Ipsum text from Wikipedia.
   */
  const THE_STRING = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

  /**
   * Various static properties to clog your RAM with Lorem Ipsum.
   *
   * @var string[]
   */
  protected static $sentences;
  protected static $words;

  /**
   * Calls external function, prepending the arguments list with Lorem Ipsum.
   *
   * @param string $function
   *   Function name.
   * @param array $arguments
   *   Array of arguments to pass to the function after the Lorem Ipsum.
   *
   * @return mixed
   *   Returns the return value of the function, or FALSE on error.
   */
  public static function __callStatic($function, array $arguments) {
    array_unshift($arguments, self::THE_STRING);

    return call_user_func_array($function, $arguments);
  }

  /**
   * Splits the Lorem Ipsum on sentences.
   *
   * @return string[]
   *   Array of sentences.
   */
  public static function getSentences() {
    if (!isset(self::$sentences)) {
      self::$sentences = array_filter(explode('. ', self::THE_STRING . ' '));
      array_walk(self::$sentences, function (&$sentence) {
        $sentence .= '.';
      });
    }

    return self::$sentences;
  }

  /**
   * Gets a sentence from Lorem Ipsum.
   *
   * @param int $n
   *   (optional) A sentence number (counting from 0). Any signed integer.
   *
   * @return string
   *   A sentence.
   */
  public static function getSentence($n = 0) {
    return self::getInfiniteArrayOffset(self::getSentences(), $n);
  }

  /**
   * Splits the Lorem Ipsum on words.
   *
   * @return string[]
   *   Array of words.
   */
  public static function getWords() {
    if (!isset(self::$words)) {
      self::$words = explode(' ', self::THE_STRING);
      array_walk(self::$words, function (&$word) {
        $word = rtrim($word, '.,');
      });
    }

    return self::$words;
  }

  /**
   * Gets a word from Lorem Ipsum.
   *
   * @param int $n
   *   (optional) A word number (counting from 0). Any signed integer.
   *
   * @return string
   *   A word.
   */
  public static function getWord($n = 0) {
    return self::getInfiniteArrayOffset(self::getWords(), $n);
  }

  /**
   * Gets an element from an infinitely repeating array.
   *
   * @param array $array
   *   Non-empty indexed array.
   * @param int $offset
   *   Array offset. Any signed integer.
   *
   * @return mixed
   *   Array element.
   */
  protected static function getInfiniteArrayOffset(array $array, $offset) {
    $count = count($array);

    if (($offset %= $count) < 0) {
      $offset += $count;
    }

    return $array[$offset];
  }

}
