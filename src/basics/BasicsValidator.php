<?php

namespace basics;

use InvalidArgumentException;

class BasicsValidator implements BasicsValidatorInterface
{

  public function isMinutesException(int $minute): void
  {
    if($minute < 0 || $minute > 60) {
      throw new InvalidArgumentException('error');
    }
  }

  public function isYearException(int $year): void
  {
    if($year < 1900) {
      throw new InvalidArgumentException('error');
    }
  }

  public function isValidStringException(string $input): void
  {
    if(strlen($input) > 6 || strlen($input) < 6) {
      throw new InvalidArgumentException('error');
    }
  }
}