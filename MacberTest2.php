<?php
/**
* Divide the array into many sub-arrays,
* Where each subarray is at most of group size.
* write this method
* @method static any[] group(any[] $array, int $size)
* @example MacberTest2::group([1, 2, 3, 4, 5], 2) -> [[ 1, 2], [3, 4], [5]]
* @example MacberTest2::group([1, 2, 3, 4, 5], 3) -> [[ 1, 2, 3], [4, 5]]
* @example MacberTest2::group([1, 2, 3, 4, 5], 6) -> [[ 1, 2, 3, 4, 5]]
*/
final class MacberTest2
{
    public static function group(array $array, int $size): array
    {
        $result = [];

        // Loop through the input array in chunks of size $size
        foreach (array_chunk($array, $size) as $chunk) {
            // Add the current chunk as a sub-array to the result array
            $result[] = $chunk;
        }

        return $result;
    }
}

echo '<pre>'; print_r(MacberTest2::group([1, 2, 3, 4, 5], 2)); echo '</pre><hr>';

echo '<pre>'; print_r(MacberTest2::group([1, 2, 3, 4, 5], 3)); echo '</pre><hr>';

echo '<pre>'; print_r(MacberTest2::group([1, 2, 3, 4, 5], 6)); echo '</pre><hr>';


