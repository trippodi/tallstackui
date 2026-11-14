<?php

namespace Trippodi\TallStackUi\Components\Form\Label;

use Illuminate\Contracts\View\View;
use Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\Support\Runtime\Components\LabelRuntime;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.label')]
#[PassThroughRuntime(LabelRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ?string $id = null,
        public ?string $label = null,
        public ?bool $error = false,
        public ?bool $invalidate = null
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.label');
    }

    public function customization(): array
    {
        return [
            'text' => 'dark:text-dark-300 mb-1 block text-sm font-medium text-gray-600',
            'asterisk' => 'font-bold text-red-500 not-italic',
            'error' => 'text-red-600 dark:text-red-500',
        ];
    }
}
