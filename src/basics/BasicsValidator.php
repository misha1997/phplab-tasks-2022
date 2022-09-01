<?php

namespace basics;

use InvalidArgumentException;

class BasicsValidator implements BasicsValidatorInterface
{

  public function isMinutesException(int $minute): void
  {
    if($minute < 0 || $minute > 60) {
      throw new InvalidArgumentException('Interval must be between 0 and 60');
    }
  }

  public function isYearException(int $year): void
  {
    if($year < 1900) {
      throw new InvalidArgumentException('Year less than 1900');
    }
  }

  public function isValidStringException(string $input): void
  {
    if(strlen($input) > 6 || strlen($input) < 6) {
      throw new InvalidArgumentException('Value must not be greater or less than 6');
    }
  }
}