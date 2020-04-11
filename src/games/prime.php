<?php

/**
 * Command Line functions release game Prime numbers
 *
 * PHP version 7.3
 *
 * @category PHP
 * @package  Php-project-lvl1
  MIT
  */

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";
const MAX_RANDOM_VALUE = 65565;

/**
 * The function checks the number is prime
 *
 * @param integer $num random number
 *
 * @return bool if true then the number is prime
 */
function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    //if the number is even then it is not prime
    if ($num % 2 === 0) {
        return $num === 2;
    }
    $div = 3;
    $limit = sqrt($num);
    //any compound number has its own divisor, not exceeding the square root of
    while ($div <= $limit) {
        if (($num % $div) === 0) {
            return false;
        }
        $div += 2;
    }
    return true;
}

/**
 * Function run game prime
 *
 * @return void
 */
function runPrime()
{
    $getPrimeData = function () {
        $question = mt_rand(3, MAX_RANDOM_VALUE);
        $currentAnswer = isPrime($question) ? 'yes' : 'no';

        $gameData = [];
        $gameData['currentAnswer'] = $currentAnswer;
        $gameData['question'] = $question;
        return $gameData;
    };

    run($getPrimeData, DESCRIPTION);
}
