<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Form\Password;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\View\ComponentSlot;
use Trippodi\Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\Trippodi\TallStackUi\Attributes\SkipDebug;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Components\Floating\Component as Floating;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\Support\Runtime\Components\PasswordRuntime;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.password')]
#[PassThroughRuntime(PasswordRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    public function __construct(
        public ComponentSlot|string|null $label = null,
        public ComponentSlot|string|null $hint = null,
        public Collection|array|bool|null $rules = null,
        public ?bool $mixedCase = false,
        public bool|string|null $generator = null,
        public ?bool $invalidate = null,
        public ?bool $typingOnly = null,
        #[SkipDebug]
        public ?bool $simple = null,
    ) {
        $default = __tst_get_component_configuration(self::class, 'rules');

        $this->simple = $this->rules === null && $this->generator === null;

        $this->rules = collect(is_bool($this->rules) || is_null($this->rules) ? $default : $this->rules)
            ->mapWithKeys(function (string $value, ?string $key = null) use ($default): array {
                // When $this->rules is bool/null, we interact with default values.
                if (is_bool($this->rules) || is_null($this->rules)) {
                    return match ($key) {
                        'min' => ['min' => $value],
                        'numbers' => ['numbers' => (bool) $value],
                        'mixed' => ['mixed' => (bool) $value],
                        'symbols' => ['symbols' => $value],
                        default => [],
                    };
                }

                $rescued = rescue(fn () => explode(':', $value)[1], report: false);

                return match (true) {
                    str_contains($value, 'min') => ['min' => $rescued ?? $default['min'] ?? 8],
                    str_contains($value, 'numbers') => ['numbers' => true],
                    str_contains($value, 'mixed') => ['mixed' => true],
                    str_contains($value, 'symbols') => ['symbols' => $rescued ?? $default['symbols'] ?? '!@#$%^&*()_+-='],
                    default => [$key => $value],
                };
            });
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.password');
    }

    public function customization(): array
    {
        return Arr::dot([
            'slot' => [
                'spacing' => 'ml-1 mr-2',
            ],
            'icon' => [
                'wrapper' => 'flex items-center',
                'wrapper-extra' => 'justify-between gap-2',
                'class' => 'h-5 w-5 cursor-pointer',
                'capslock' => 'h-5 w-5 text-red-500',
            ],
            'rules-strikethrough' => 'line-through',
            'floating' => [
                'default' => collect(app(Floating::class)->customization())->get('wrapper'),
                'class' => 'w-full p-3',
            ],
            'rules' => [
                'title' => 'text-md font-semibold text-red-500 dark:text-dark-300',
                'block' => 'mt-2 flex flex-col',
                'items' => [
                    'base' => 'inline-flex items-center gap-1 text-gray-700 text-sm dark:text-dark-300',
                    'icons' => [
                        'error' => 'h-5 w-5 text-red-500',
                        'success' => 'h-5 w-5 text-green-500',
                    ],
                ],
            ],
        ]);
    }

    /** @throws Exception */
    protected function validate(): void
    {
        if (is_string($this->generator) && trim($this->generator) === '') {
            __tst_validation_exception($this, 'The [generator] target cannot be empty.');
        }

        if ($this->generator && $this->rules?->isEmpty()) {
            __tst_validation_exception($this, 'The [generator] requires the [rules] of the password.');
        }
    }
}
