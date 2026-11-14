<?php

namespace Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class DialItemsRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return ['tag' => filled($this->data('href')) ? 'a' : 'button'];
    }
}
