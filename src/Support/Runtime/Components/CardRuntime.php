<?php

namespace Trippodi\Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class CardRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return [
            'align' => $this->alignment(),
            'bag' => $this->alignable(),
            'lines' => $this->skeleton(3),
        ];
    }
}
