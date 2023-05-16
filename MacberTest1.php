<?php 
final class MacberTest1
{
    /**
    * Count string vowels.
    * write this method
    * @method static int count(string $string)
    * @example MacberTest1::count('Hello!') === 2
    * @example MacberTest1::count('Why?') === 0
    */
    public static function count(string $string): int
    {
        preg_match_all('/[aeiou]/i', $string, $matches);
        return count($matches[0]);
    }
}

echo 'count of vowels characters in Hello! is ' . MacberTest1::count('HEllo!');
echo '<br/>';
echo  'count of vowels characters in Why? is ' .MacberTest1::count('Why?');
