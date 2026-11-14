<?php

namespace Trippodi\TallStackUi\Components\Boolean;

use Closure;
use Illuminate\Contracts\View\View;
use Trippodi\TallStackUi\Attributes\ColorsThroughOf;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\Support\Colors\Components\BooleanColors;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('boolean')]
#[ColorsThroughOf(BooleanColors::class)]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public bool|Closure $boolean = false,
        public ?string $iconWhenTrue = null,
        public ?string $iconWhenFalse = null,
        public ?string $colorWhenTrue = null,
        public ?string $colorWhenFalse = null,
    ) {
        $this->boolean = value($this->boolean);

        $this->iconWhenTrue ??= 'check-circle';
        $this->iconWhenFalse ??= 'check-circle';
        $this->colorWhenTrue ??= 'primary';
        $this->colorWhenFalse ??= 'gray';
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.boolean.main');
    }

    public function customization(): array
    {
        return ['icon' => 'w-5 h-5'];
    }
}
