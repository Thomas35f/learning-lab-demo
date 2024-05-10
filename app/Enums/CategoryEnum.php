<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self Travail() Travail
 * @method static self Hobby() Hobby
 * @method static self Administration() Administration
 * @method static self Hobby() Famille
 * @method static self Ecole() Ecole
 */
final class CategoryEnum extends Enum
{
    public function __toString(): string
    {
        return (string) __("enums.category.{$this->value}");
    }
}
