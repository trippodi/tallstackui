<?php

namespace Trippodi\Trippodi\TallStackUi\Exceptions;

use Exception;

class MissingLivewireException extends Exception
{
    public function __construct(string $component)
    {
        parent::__construct('The ['.$component.'] component should only be used inside Livewire components.');
    }
}
