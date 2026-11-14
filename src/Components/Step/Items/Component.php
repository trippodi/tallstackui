<?php

namespace Trippodi\TallStackUi\Components\Step\Items;

use Illuminate\Contracts\View\View;
use Trippodi\TallStackUi\TallStackUiComponent;

class Component extends TallStackUiComponent
{
    public function __construct(
        public int $step,
        public ?string $title = null,
        public ?string $description = null,
        public ?bool $completed = false,
        public ?string $id = null,
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.step.items');
    }
}
