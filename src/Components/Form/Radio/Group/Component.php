<?php

namespace Trippodi\TallStackUi\Components\Form\Radio\Group;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Trippodi\TallStackUi\Attributes\ColorsThroughOf;
use Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\TallStackUi\Attributes\SkipDebug;
use Trippodi\TallStackUi\Attributes\SoftCustomization;
use Trippodi\TallStackUi\Components\Traits\SelectionCustomization;
use Trippodi\TallStackUi\Components\Traits\SelectionSetup;
use Trippodi\TallStackUi\Customization\Contracts\Customization;
use Trippodi\TallStackUi\Support\Colors\Components\SelectionColors;
use Trippodi\TallStackUi\Support\Runtime\Components\SelectionGroupRuntime;
use Trippodi\TallStackUi\TallStackUiComponent;

#[SoftCustomization('form.radio.group')]
#[ColorsThroughOf(SelectionColors::class)]
#[PassThroughRuntime(SelectionGroupRuntime::class)]
class Component extends TallStackUiComponent implements Customization
{
    use SelectionCustomization;
    use SelectionSetup;

    public function __construct(
        public ?string $id = null,
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $color = 'primary',
        public ?string $select = null,
        public ?int $columns = 3,
        public ?string $position = 'left',
        public ?bool $required = false,
        public ?bool $invalidate = null,
        public ?string $list = null,
        public ?string $card = null,
        public ?string $panel = null,
        public ?string $inline = null,
        public ?string $xs = null,
        public ?string $sm = null,
        public ?string $md = null,
        public ?string $lg = null,
        #[SkipDebug]
        public Collection|array $options = [],
        #[SkipDebug]
        public ?string $size = null,
        #[SkipDebug]
        public ?string $variant = null,
        #[SkipDebug]
        public ?array $selectable = [],
        #[SkipDebug]
        public string $type = 'radio',
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.form.radio.group.main');
    }

    public function customization(): array
    {
        return $this->selection('form-radio rounded-full');
    }
}
