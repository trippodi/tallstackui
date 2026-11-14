<?php

namespace Trippodi\TallStackUi\Components\Form\Error;

use Illuminate\Contracts\View\View;
use Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\Support\Runtime\Components\ErrorRuntime;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.error')]
#[PassThroughRuntime(ErrorRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(public ?string $property = null)
    {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.error');
    }

    public function customization(): array
    {
        return ['text' => 'mt-1 block text-sm font-medium text-red-500'];
    }
}
