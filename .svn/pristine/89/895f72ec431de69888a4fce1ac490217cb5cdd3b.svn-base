<?php
# @Author: tang_g/phetsi_w
# @Date:   2017-01-03T16:32:42+01:00
# @Filename: rules_full.php
# @Last modified by:   tang_g
# @Last modified time: 2017-01-04T15:31:46+01:00




/**
 * @param $data
 * @return bool
 */
function functionNumber($data) {
    $output = 0;
    preg_match_all("/([a-zA-Z]+ [a-zA-Z0-9]+\()/", $data, $function_number);
    $count = count($function_number[1]);
    if ($count > 5) {
        echo "[\e[91m   SCAN   \e[0m] Error: Number of function exceeded 5 per file.\n";
        $output = $count - 5;
    }

    return $output;
}

/**
 * @param $data
 * @return bool
 */
function headerForgotten($data) {
    $output = 0;

    $path = dirname($data);

    $header_path = preg_match_all("/([a-zA-z0-9]+|\W)\.c/", $path);
    $header_mail = preg_match_all("/([a-zA-Z]+_[a-zA-Z]@etna-alternance.net)/", $path);

    if ($header_path == 0 || $header_mail == 0)
    {
        echo "[\e[91m   SCAN   \e[0m] Error: No valid header.\n";
        $output = 1;
    }

    return $output;
}

/**
 * @param $data
 * @return bool
 */
function functionLineNumber($data) {
    $output = 0;
    preg_match_all("({([^{}]|(?R))*[^\r\n]*)", $data, $count);

    $i = 0;
    while ($i < count($count)) {
      if (substr_count($count[0][$i], "\n") > 27) {
            echo "[\e[91m   SCAN   \e[0m] Error: Max line per function number " . ($i + 1) . " are 25.\n";
            $output = substr_count($count[0][$i], "\n") - 27;
        }
        $i = $i + 1;
    }

    return $output;
}
