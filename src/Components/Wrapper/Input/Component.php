<?php

namespace Trippodi\TallStackUi\Components\Wrapper\Input;

use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentSlot;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('wrapper.input')]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ?string $property = null,
        public ComponentSlot|string|null $label = null,
        public ?string $id = null,
        public ?string $hint = null,
        public ?bool $invalidate = null,
        public ?bool $error = false,
        public ?bool $clearable = null,
    ) {
        $this->invalidate ??= config('ts-ui-trippodi.invalidate_global') ?? false;
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.wrapper.input');
    }

    public function customization(): array
    {
        return ['wrapper' => 'relative rounded-md'];
    }
}
