<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self job() Travail
 * @method static self hobby() Hobby
 */
final class CategoryEnum extends Enum
{
    public function __toString(): string
    {
        return (string) __("enums.category.{$this->value}");
    }
}
