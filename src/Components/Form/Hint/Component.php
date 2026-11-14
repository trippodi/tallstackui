<?php

namespace Trippodi\TallStackUi\Components\Form\Hint;

use Illuminate\Contracts\View\View;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.hint')]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(public ?string $hint = null)
    {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.hint');
    }

    public function customization(): array
    {
        return ['text' => 'dark:text-dark-400 mt-1 block text-sm text-gray-500'];
    }
}
