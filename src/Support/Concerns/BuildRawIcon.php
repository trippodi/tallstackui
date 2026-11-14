<?php

namespace Trippodi\TallStackUi\Support\Concerns;

use Exception;
use Trippodi\TallStackUi\Exceptions\InappropriateIconGuideExecution;
use Trippodi\TallStackUi\Support\Icons\IconGuideMap;

trait BuildRawIcon
{
    /** @throws Exception */
    public function raw(?string $path = null): string
    {
        InappropriateIconGuideExecution::validate(static::class);

        return IconGuideMap::build($this, $path);
    }
}
