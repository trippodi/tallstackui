<?php

namespace Trippodi\Trippodi\TallStackUi\Support\Runtime\Components;

use Exception;
use Trippodi\Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class AutocompleteRuntime extends AbstractRuntime
{
    /** @throws Exception */
    public function runtime(): array
    {
        return [
            ...$this->bind(),
            ...$this->locks(),
            'value' => $this->sanitize(numeric: true),
        ];
    }
}
