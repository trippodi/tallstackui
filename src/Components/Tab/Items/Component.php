<?php

namespace Trippodi\TallStackUi\Components\Tab\Items;

use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentSlot;
use Trippodi\TallStackUi\Attributes\PassThroughRuntime;
use Trippodi\TallStackUi\Attributes\SkipDebug;
use Trippodi\TallStackUi\Support\Runtime\Components\TabItemsRuntime;
use Trippodi\TallStackUi\TallStackUiComponent;

#[PassThroughRuntime(TabItemsRuntime::class)]
class Component extends TallStackUiComponent
{
    public function __construct(
        public ?string $tab = null,
        public ?string $title = null,
        public ?string $href = null,
        public ?bool $navigate = null,
        public ?bool $navigateHover = null,
        #[SkipDebug]
        public ComponentSlot|string|null $left = null,
        #[SkipDebug]
        public ComponentSlot|string|null $right = null,
    ) {
        //
    }

    public function blade(): View
    {
        return view('ts-ui-trippodi::components.tab.items');
    }
}
