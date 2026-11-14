<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Tooltip;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Trippodi\Trippodi\TallStackUi\Attributes\ColorsThroughOf;
use Trippodi\Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\Trippodi\TallStackUi\Attributes\SkipDebug;
use Trippodi\Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\Trippodi\TallStackUi\Exceptions\InvalidSelectedPositionException;
use Trippodi\Trippodi\TallStackUi\Support\Colors\Components\TooltipColors;
use Trippodi\Trippodi\TallStackUi\Support\Concerns\BuildRawIcon;
use Trippodi\Trippodi\TallStackUi\Support\Icons\IconGuideMap;
use Trippodi\Trippodi\TallStackUi\Support\Runtime\Components\TooltipRuntime;
use Trippodi\Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('tooltip')]
#[ColorsThroughOf(TooltipColors::class)]
#[PassThroughRuntime(TooltipRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    use BuildRawIcon;

    public const BALLOONS = [
        'black', 'primary', 'secondary', 'slate', 'gray', 'zinc', 'neutral', 'stone',
        'red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal',
        'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink',
        'rose', 'mauve', 'olive', 'mist', 'taupe',
    ];

    public const DELAYS = ['slow', 'fast', 'faster', 'flash'];

    public const SCALES = ['sm', 'md', 'lg'];

    /** @throws Exception */
    public function __construct(
        public ?string $text = null,
        public ?string $icon = 'question-mark-circle',
        public string $color = 'primary',
        public ?string $balloon = null,
        public ?string $scale = null,
        public ?string $delay = null,
        public ?bool $xs = null,
        public ?bool $sm = null,
        public ?bool $md = null,
        public ?bool $lg = null,
        public ?string $position = 'top',
        #[SkipDebug]
        public ?string $size = null,
        #[SkipDebug]
        public bool $internal = true,
    ) {
        $this->icon = IconGuideMap::internal($this->icon);
        $this->size = $this->lg ? 'lg' : ($this->md ? 'md' : ($this->xs ? 'xs' : 'sm'));
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.tooltip.main');
    }

    public function customization(): array
    {
        return Arr::dot([
            'wrapper' => 'inline-flex select-none',
            'sizes' => [
                'xs' => 'h-4 w-4',
                'sm' => 'h-5 w-5',
                'md' => 'h-6 w-6',
                'lg' => 'h-7 w-7',
            ],
        ]);
    }

    /** @throws InvalidSelectedPositionException */
    protected function validate(): void
    {
        InvalidSelectedPositionException::validate(static::class, $this->position);

        if ($this->delay !== null && ! in_array($this->delay, self::DELAYS)) {
            __tst_validation_exception($this, 'The [delay] must be one of the following: ['.implode(', ', self::DELAYS).']');
        }

        if ($this->balloon !== null && ! in_array($this->balloon, self::BALLOONS)) {
            __tst_validation_exception($this, 'The [balloon] must be one of the following: ['.implode(', ', self::BALLOONS).']');
        }

        if ($this->scale !== null && ! in_array($this->scale, self::SCALES)) {
            __tst_validation_exception($this, 'The [scale] must be one of the following: ['.implode(', ', self::SCALES).']');
        }
    }
}
