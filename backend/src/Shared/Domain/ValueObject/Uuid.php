<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends StringValueObject
{
    private function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        parent::__construct($value);
    }

    private function ensureIsValidUuid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $id)
            );
        }
    }

    public static function random(): static
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public static function create(string $value): static
    {
        return new static($value);
    }
}
