<?php
# @Author: tang_g/phetsi_w
# @Date:   2017-01-03T16:32:42+01:00
# @Filename: rules_sequential.php
# @Last modified by:   tang_g
# @Last modified time: 2017-01-04T16:37:05+01:00

/**
 * @param $data
 * @param $index
 * @return bool
 */
function lengthLimit($data, $index) {
    $output = 0;

    if (preg_match("/[\w\s\W]{81,}/", $data[$index])) {
        $fault = strlen($data[$index]) - 80;
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Length limit at 80 per line.\n";
        $output = $fault;
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function doubleCariage($data, $index) {
    $output = 0;

    if (preg_match("/^\n/", $data[$index]) && preg_match("/^\n/", $data[$index + 1])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Double cariage.\n";
        $output = 1;
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function endOfLineSpace($data, $index) {
    $output = 0;

    if (preg_match("/(\w|\W){1} $/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Space at end of line.\n";
        $output = 1;
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function declarationNoAssignment($data, $index) {
    $output = 0;

    if (preg_match("/(\w) \w{1,};( |\S)/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Declaration and assignment in same time are prohibited.\n";
        $output = 1;
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function keywordSpace($data, $index) {
    $output = 0;

    if (preg_match("/^(\s+\w+\s\w+(=|\(|,\w))|^(\s+\w+(=|\(|,\w))|(=([a-zA-Z0-9]+|\d))|(char|int|float)(\w|\d)/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Single space between type keyword and rest.\n";
        $output = 1;
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function parameterNumber($data, $index) {
    error_reporting(0);
    $output = 0;

    if (preg_match("/\([^\]]*\)/", $data[$index], $match)) {
        $i = 0;
        $cpt = 0;
        $phrase = $match[0];
        while ($phrase[$i] != NULL)
        {
          if ($phrase[$i] == ",")
          {
            $cpt = $cpt + 1;
          }
          if ($cpt >= 4)
          {
            echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Parameter limit exceeded.\n";
            $output = 1;
            break;
          }
          $i = $i + 1;
        }
    }

    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function tabulationForgotten($data, $index) {
    $output = 0;
    if (preg_match("/\s{1,}[a-zA-Z0-9]+ \w+;/", $data[$index])) {
        if (preg_match("/\s{1,}[a-zA-Z0-9]+\s{1,}.*;/", $data[$index])) {
            $cpt = $index + 1;
            if ((!preg_match("/\s{1,}[a-zA-Z0-9]+\s{1,}[a-zA-Z0-9];/", $data[$cpt])) && (!preg_match("/^\s$/", $data[$cpt]))) {
                echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Tabulation forgotten.\n";
                echo "[\e[91m   SCAN   \e[0m] Error: line " . ($cpt + 1) . ": Back Line forgotten.\n";
                $output = 1;
            } else {
                echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Tabulation forgotten.\n";
                $output = 1;
            }
        }
    }
    return $output;
}

function tabulationfunctionForgotten($data, $index) {
    $output = 0;
    if (preg_match("/[a-zA-Z0-9]+ \w+\(/", $data_index))
    {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Function Tabulation forgotten.\n";
        $output = 1;
    }
    return $output;
}


/**
 * @param $data
 * @param $index
 * @return bool
 */
function includeValide($data, $index) {
    $output = 0;
    if (preg_match("/(\s#include<\w+.h>|\s#include\"\w+.h\"|\s#include\"\w+.c\")/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Invalid include.\n";
        $output = 1;
    }
    if (preg_match("/(#include<\w+.h>|#include\"\w+.h\"|#include\"\w+.c\")/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Invalid include.\n";
        $output = 1;
    }
    if (preg_match("/(\s#include <\w+.h>|\s#include \"\w+.h\"|\s#include \"\w+.c\")/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Invalid include.\n";
        $output = 1;
    }
    if (preg_match("/(#include\s{2,}<\w+.h>|#include\s{2,}\"\w+.h\"|#include\s{2,}\"\w+.c\")/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Invalid include.\n";
        $output = 1;
      }
    return $output;
}

/**
 * @param $data
 * @param $index
 * @return bool
 */
function defineValide($data, $index) {
    $output = 0;
    if (preg_match("/(\s#include<\w+.h>|\s#include\"\w+.h\"|\s#include\"\w+.c\")/", $data[$index])) {
        echo "[\e[91m   SCAN   \e[0m] Error: line " . ($index + 1) . ": Invalid include.\n";
        $output = 1;
    }
    return $output;
}
