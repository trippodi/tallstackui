<?php

namespace Trippodi\TallStackUi\Support\Runtime\Components;

use Trippodi\TallStackUi\Components\Carousel\Component as Carousel;
use Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class CarouselRuntime extends AbstractRuntime
{
    public function runtime(): array
    {
        /** @var Carousel $component */
        $component = $this->component;

        $limit = $component->limit ?? __tst_get_component_configuration(Carousel::class, 'limit') ?? 6;

        return [
            'visible' => $limit,
            'remaining' => max(0, count($component->images) - $limit),
            'backdrop' => collect($component->images)->contains('backdrop', true),
        ];
    }
}
