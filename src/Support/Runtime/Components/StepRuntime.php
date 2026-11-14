<?php

namespace Trippodi\Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class StepRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        return ['lines' => $this->skeleton(3)];
    }
}
