<?php

namespace Trippodi\TallStackUi;

use Illuminate\View\Component;
use Trippodi\Trippodi\TallStackUi\Support\Concerns\BaseComponent\ManagesClasses;
use Trippodi\Trippodi\TallStackUi\Support\Concerns\BaseComponent\ManagesCompilation;
use Trippodi\Trippodi\TallStackUi\Support\Concerns\BaseComponent\ManagesOutput;
use Trippodi\Trippodi\TallStackUi\Support\Concerns\BaseComponent\ManagesRender;

abstract class TallStackUiComponent extends Component
{
    use ManagesClasses;
    use ManagesCompilation;
    use ManagesOutput;
    use ManagesRender;
}
