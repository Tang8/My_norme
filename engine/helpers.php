<?php
# @Author: tang_g/phetsi_w
# @Date:   2017-01-03T16:32:42+01:00
# @Filename: helpers.php
# @Last modified by:   tang_g
# @Last modified time: 2017-01-04T16:25:54+01:00

/**
 * @param $pattern
 * @param int $flags
 * @return array
 */
function glob_recursive($pattern, $flags = 0) {
    $output = glob($pattern, $flags);

    foreach(glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
        $output = array_merge($output, glob_recursive($dir . '/' . basename($pattern), $flags));
    }

    return $output;
}
