<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

/**
 * Class PublishStatusEnum.
 *
 * Statut du post
 *
 * @method static self news()
 * @method static self press()
 * @method static self event()
 * @method static self public_market()
 */
final class PostCategoryEnum extends Enum
{
    public function __toString(): string
    {
        return (string) __("enums.post_category.{$this->value}");
    }
}
