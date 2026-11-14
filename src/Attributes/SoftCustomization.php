<?php

namespace Trippodi\Trippodi\TallStackUi\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class SoftCustomization
{
    public function __construct(public string $key)
    {
        //
    }

    public function prefixed(): string
    {
        return 'ts-ui-trippodi::customization.'.$this->key;
    }
}
