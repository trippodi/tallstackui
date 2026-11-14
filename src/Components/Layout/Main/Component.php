<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Layout\Main;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\ComponentSlot;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('layout')]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ComponentSlot|string|null $top = null,
        public ComponentSlot|string|null $header = null,
        public ComponentSlot|string|null $menu = null,
        public ComponentSlot|string|null $footer = null,
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.layout.main');
    }

    public function customization(): array
    {
        return Arr::dot([
            'wrapper' => [
                'first' => 'min-h-full',
                'second' => [
                    'expanded' => 'md:pl-72',
                    'collapsed' => 'md:pl-22',
                    'transition' => 'transition-[padding] duration-300',
                    'footer' => 'flex min-h-dvh flex-col',
                ],
            ],
            'main' => 'mx-auto w-full max-w-full p-10',
            'main.grow' => 'grow',
        ]);
    }
}
