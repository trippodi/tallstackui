<?php

namespace Trippodi\Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class DropdownItemsRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return ['tag' => filled($this->data('href')) ? 'a' : ($this->data('text') ? 'button' : 'div')];
    }
}
