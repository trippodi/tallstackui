<?php

namespace Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class LoadingRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return [
            'name' => $this->livewire?->getName(),
        ];
    }
}
