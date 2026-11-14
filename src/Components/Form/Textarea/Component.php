<?php

namespace Trippodi\TallStackUi\Components\Form\Textarea;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\ComponentSlot;
use InvalidArgumentException;
use Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Components\Traits\FormDefaultInputClasses;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\Support\Runtime\Components\TextareaRuntime;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.textarea')]
#[PassThroughRuntime(TextareaRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    use FormDefaultInputClasses;

    public function __construct(
        public ComponentSlot|string|null $label = null,
        public ComponentSlot|string|null $hint = null,
        public ?bool $resize = false,
        public ?bool $resizeAuto = false,
        public ?bool $invalidate = null,
        public ?bool $count = false,
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.textarea');
    }

    public function customization(): array
    {
        return Arr::dot([
            'input' => [...$this->input()],
            'error' => $this->error(),
            'count' => [
                'base' => 'dark:text-dark-400 absolute right-0 mt-1 text-sm text-gray-500',
                'max' => 'font-semibold text-red-500 dark:text-red-500',
            ],
        ]);
    }

    /** @throws InvalidArgumentException */
    protected function validate(): void
    {
        if ($this->attributes->has('rows') && $this->resizeAuto) {
            __tst_validation_exception($this, 'The textarea cannot be used with [rows] and [resize-auto] at the same time because the rows will have no effect since resizing is automatic.');
        }
    }
}
