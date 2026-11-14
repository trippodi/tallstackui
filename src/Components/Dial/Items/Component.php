<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Dial\Items;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Trippodi\Trippodi\TallStackUi\Attributes\ColorsThroughOf;
use Trippodi\Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\Support\Colors\Components\DialItemsColors;
use Trippodi\Trippodi\TallStackUi\Support\Runtime\Components\DialItemsRuntime;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('dial.items')]
#[ColorsThroughOf(DialItemsColors::class)]
#[PassThroughRuntime(DialItemsRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ?string $icon = null,
        public ?string $label = null,
        public ?string $href = null,
        public ?bool $navigate = null,
        public ?bool $navigateHover = null,
        public ?string $color = null,
        public ?string $style = 'solid',
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.dial.items');
    }

    public function customization(): array
    {
        return Arr::dot([
            'wrapper' => [
                'base' => 'relative flex items-center',
                'horizontal' => 'flex-col gap-1',
            ],
            'item' => [
                'base' => 'flex h-10 w-10 items-center justify-center shadow-lg focus:outline-hidden cursor-pointer transition-colors',
                'default' => 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-800 dark:bg-dark-800 dark:text-dark-300 dark:hover:bg-dark-700 dark:hover:text-dark-200',
                'bordered' => 'border',
            ],
            'label' => [
                'tooltip' => 'absolute whitespace-nowrap rounded-md bg-gray-900 px-2 py-1 text-xs text-white dark:bg-dark-800',
                'tooltip-right' => 'right-full mr-2',
                'tooltip-left' => 'left-full ml-2',
                'inline' => 'whitespace-nowrap rounded-md bg-gray-900 px-2 py-1 text-xs text-white dark:bg-dark-600',
            ],
            'icon' => 'h-5 w-5',
        ]);
    }

    protected function validate(): void
    {
        if (! $this->icon) {
            __tst_validation_exception($this, 'The [icon] property is required.');
        }
    }
}
