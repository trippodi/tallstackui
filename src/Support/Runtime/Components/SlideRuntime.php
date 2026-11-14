<?php

namespace Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class SlideRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return [
            'event' => $event = str($this->data('id'))->slug()->kebab(),
            'open' => $event.'-open',
            'close' => $event.'-close',
            'align' => $this->alignment(),
            'bag' => $this->alignable(),
        ];
    }
}
