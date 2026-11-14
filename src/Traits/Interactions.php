<?php

namespace Trippodi\Trippodi\TallStackUi\Traits;

use Livewire\Component;
use Trippodi\Trippodi\TallStackUi\Interactions\Banner;
use Trippodi\Trippodi\TallStackUi\Interactions\Dialog;
use Trippodi\Trippodi\TallStackUi\Interactions\Toast;

trait Interactions
{
    public function banner(): Banner
    {
        /** @var Component|null $this */
        return new Banner(str_contains(static::class, 'Controllers') ? null : $this);
    }

    public function dialog(): Dialog
    {
        /** @var Component|null $this */
        return new Dialog(str_contains(static::class, 'Controllers') ? null : $this);
    }

    public function toast(): Toast
    {
        /** @var Component|null $this */
        return new Toast(str_contains(static::class, 'Controllers') ? null : $this);
    }
}
