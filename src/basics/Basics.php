<?php

namespace basics;

class Basics implements BasicsInterface 
{
  private const MIN_TIME = 15;
  private const TIME_TITLE = ['first', 'second', 'third', 'fourth'];

  private BasicsValidator $validator;

  public function __construct(BasicsValidator $validator)
  {
    $this->validator = $validator;
  }

  public function getMinuteQuarter(int $minute): string
  {
    $this->validator->isMinutesException($minute);
    return self::TIME_TITLE[$minute ? ceil($minute / (self::MIN_TIME)) - 1 : 3];
  }

  public function isLeapYear(int $year): bool
  {
    $this->validator->isYearException($year);
    return (!($year % 4) && ($year % 100)) || !($year % 400);
  }

  public function isSumEqual(string $input): bool
  {
    $this->validator->isValidStringException($input);
    return array_sum(str_split(substr($input, 0, 3))) == array_sum(str_split(substr($input, 3, 6)));
  }
}