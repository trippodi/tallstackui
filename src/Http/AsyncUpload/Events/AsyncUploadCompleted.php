<?php

namespace Trippodi\TallStackUi\Http\AsyncUpload\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Trippodi\TallStackUi\Http\AsyncUpload\AsyncUploadResponse;

class AsyncUploadCompleted
{
    use Dispatchable;

    public function __construct(
        public readonly AsyncUploadResponse $response,
        public readonly string $disk,
        public readonly string $uuid,
    ) {
        //
    }
}
