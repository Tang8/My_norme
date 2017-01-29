<?php
# @Author: tang_g/phetsi_w
# @Date:   2017-01-03T16:32:42+01:00
# @Filename: checker.php
# @Last modified by:   tang_g
# @Last modified time: 2017-01-04T15:30:34+01:00

require_once('dictionaries/rules_full.php');
require_once('dictionaries/rules_sequential.php');

/**
 * @param $list_selection
 * @return array
 */
function rules_get_list($list_selection) {
    $output = [];

    if ($list_selection === 'single') {
        $output[] = "lengthLimit";
        $output[] = "doubleCariage";
        $output[] = "endOfLineSpace";
        $output[] = "declarationNoAssignment";
        $output[] = "keywordSpace";
        $output[] = "parameterNumber";
        $output[] = "tabulationForgotten";
        $output[] = "tabulationfunctionForgotten";
        $output[] = "includeValide";
    } else if ($list_selection === 'all') {
        $output[] = "functionNumber";
        $output[] = "headerForgotten";
        $output[] = "functionLineNumber";
    }

    return $output;
}

/**
 * @param $data
 * @return int
 */
function checker_sequential($data) {
    $output = 0;

    $rule_list = rules_get_list('single');

    for ($i = 0; $i < count($data); $i++) {
        foreach($rule_list as $rule) {
            $fault = $rule($data, $i);
            for ($j = 0; $j < $fault; $j++) {
                $output++;
            }
        }
    }

    return $output;
}

/**
 * @param $data
 * @return int
 */
function checker_full($data) {
    $output = 0;

    $rule_list = rules_get_list('all');

    $data_assembled = implode('', $data);

    foreach($rule_list as $rule) {
        $fault = $rule($data_assembled, $i);
        for ($j = 0; $j < $fault; $j++) {
          $output++;
        }
    }

    return $output;
}
