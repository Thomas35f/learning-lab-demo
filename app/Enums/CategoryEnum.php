<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self job() Travail
 * @method static self hobby() Hobby
 * @method static self hobby() Administration
 * @method static self hobby() Famille
 * @method static self hobby() Ecole
 */
final class CategoryEnum extends Enum
{
    public function __toString(): string
    {
        return (string) __("enums.category.{$this->value}");
    }
}
