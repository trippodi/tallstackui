<?php

namespace Trippodi\TallStackUi\Support\Runtime\Components;

use Exception;
use Trippodi\TallStackUi\Components\Form\InputSelect\Component;
use Trippodi\TallStackUi\Support\Runtime\AbstractRuntime;

class InputSelectRuntime extends AbstractRuntime
{
    /** @throws Exception */
    public function runtime(): array
    {
        $bind = $this->bind();

        // These properties do not exist in the component. We access the slots built by
        // Blade directly. There will be no error because we require this right below.
        // The component can only function if left or right are defined.
        $left = $this->data('left');
        $right = $this->data('right');

        if (! $left && ! $right) {
            __tst_validation_exception(Component::class, 'The [left] and [right] slots are mandatory.');
        }

        return [
            ...$this->locks(),
            'property' => $property = $bind->get('property'),
            'error' => $bind->get('error'),
            'id' => $bind->get('id'),
            'ref' => $property ?? uniqid(),
            'left' => $left,
            'right' => $right,
        ];
    }
}
