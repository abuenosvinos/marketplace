<?php

namespace App\MarketPlace\Domain\ValueObject;

use App\Shared\Domain\ValueObject\FloatValueObject;

class Price extends FloatValueObject
{
    public function __toString(): string
    {
        return $this->format();
    }

    public function format($format = 'es_ES'): string
    {
        if ($format === 'es_ES') {
            return number_format($this->value, 2, ',', '.');
        }
        return $this->value;
    }
}
