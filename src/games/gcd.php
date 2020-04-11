<?php

/**
 * Command Line functions release game GCD
 *
 * PHP version 7.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 MIT
  */

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const MAX_RANDOM_VALUE = 99;

/**
 * The function is expect the number is even
 *
 * @param integer $num1 first random number
 * @param integer $num2 second random number
 *
 * @return integer the greatest common divisor of given numbers
 */
function getGcd($num1, $num2)
{
    return $num2 ? getGcd($num2, $num1 % $num2) : $num1;
}

/**
 * Function run game gcd
 *
 * @return void
 */
function runGcd()
{
    $getGcdData = function () {
        $num1 = mt_rand(1, MAX_RANDOM_VALUE);
        $num2 = mt_rand(1, MAX_RANDOM_VALUE);

        $currentAnswer = strval(getGcd($num1, $num2));
        $question = "$num1 $num2";
        
        $gameData = [];
        $gameData['currentAnswer'] = $currentAnswer;
        $gameData['question'] = $question;
        return $gameData;
    };

    run($getGcdData, DESCRIPTION);
}
