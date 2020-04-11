<?php

/**
 * Command Line functions release game Even
 *
 * PHP version 7.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 */

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = ['+', '-', '*'];
const MAX_RANDOM_VALUE = 99;

/**
 * Function calculate two numbers
 *
 * @param integer $num1      first value
 * @param integer $num2      second value
 * @param string  $operation type of operation
 *
 * @return integer
 */
function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            $currentAnswer = $num1 + $num2;
            break;
        case '-':
            $currentAnswer = $num1 - $num2;
            break;
        case '*':
            $currentAnswer = $num1 * $num2;
            break;
    }
    return $currentAnswer;
}

/**
 * Function run game
 *
 * @return void
 */
function runCalc()
{
    $getCalcData = function () {
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $num1 = mt_rand(1, MAX_RANDOM_VALUE);
        $num2 = mt_rand(1, MAX_RANDOM_VALUE);

        $question = "$num1 $operation $num2";
        $currentAnswer = strval(calculate($num1, $num2, $operation));
        
        $gameData = [];
        $gameData['currentAnswer'] = $currentAnswer;
        $gameData['question'] = $question;
        return $gameData;
    };

    run($getCalcData, DESCRIPTION);
}
