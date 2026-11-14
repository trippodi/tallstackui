<?php

namespace Trippodi\Trippodi\TallStackUi\Components\Traits;

trait ProgressSetup
{
    protected function setup(): void
    {
        $this->size = $this->xs ? 'xs' : ($this->sm ? 'sm' : ($this->lg ? 'lg' : 'md'));

        $this->style = $this->light ? 'light' : 'solid';
    }
}
