<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Floating;

use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentSlot;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('floating')]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ?string $offset = '10',
        public ?string $position = 'bottom-end',
        public ComponentSlot|string|null $transition = null,
        public ComponentSlot|string|null $footer = null,
    ) {
        //
    }

    final public function anchor(): string
    {
        // Alpine's anchor plugin only knows the 12 concrete placements, so auto*
        // leaves it undefined and Floating UI drops the start/end alignment along
        // with it. Tooltip and Reaction resolve auto* through a different engine.
        $position = str_replace('auto', 'bottom', (string) $this->position);

        return match ($this->offset !== null) {
            true => "x-anchor.{$position}.offset.{$this->offset}",
            default => "x-anchor.{$position}",
        };
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.floating.main');
    }

    public function customization(): array
    {
        return ['wrapper' => 'dark:bg-dark-800 border-dark-200 dark:border-dark-700 absolute z-50 rounded-lg border bg-white'];
    }

    final public function lockable(): bool
    {
        return (bool) config('ts-ui-trippodi.floating_scroll_lock', false);
    }
}
