<?php

namespace Trippodi\Trippodi\TallStackUi\Support\Runtime\Components;

use Exception;
use Trippodi\Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class TextareaRuntime extends AbstractRuntime
{
    /** @throws Exception */
    public function runtime(): array
    {
        return [...$this->bind()->only('property', 'error', 'id')];
    }
}
