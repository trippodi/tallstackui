<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Accordion\Main;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('accordion')]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ?bool $multiple = false,
        public ?bool $shadowless = null,
        public ?bool $bordered = null,
        public ?string $chevron = 'right',
    ) {
        $configuration = __tst_get_component_configuration(self::class);

        $this->shadowless ??= $configuration['shadowless'] ?? false;
        $this->bordered ??= $configuration['bordered'] ?? false;
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.accordion.main');
    }

    public function customization(): array
    {
        return Arr::dot([
            'wrapper' => [
                'base' => 'dark:bg-dark-800 w-full overflow-hidden rounded-lg bg-white shadow-md',
                'chevron-left-cascade' => '[&>div>button]:flex-row-reverse [&>div>button]:justify-end',
            ],
            'shadowless' => 'shadow-none!',
            'bordered' => 'border border-gray-200 dark:border-dark-700',
        ]);
    }

    protected function validate(): void
    {
        if (! in_array($this->chevron, ['left', 'right'], true)) {
            __tst_validation_exception($this, 'The [chevron] prop must be either "left" or "right".');
        }
    }
}
