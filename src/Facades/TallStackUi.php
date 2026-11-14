<?php

namespace Trippodi\TallStackUi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Trippodi\TallStackUi\Support\Breadcrumbs\BreadcrumbRegistry breadcrumbs()
 * @method static \Trippodi\TallStackUi\Support\Blade\Wireable blade(?\Illuminate\View\ComponentAttributeBag $attributes = null, bool $livewire = false)
 * @method static \Trippodi\TallStackUi\Support\Blade\Directives directives()
 * @method static string icon(string $key)
 * @method static \Trippodi\TallStackUi\Customization\Customization customize(?string $component = null, ?string $scope = null)
 * @method static \Trippodi\TallStackUi\Support\Blade\ComponentPrefix|string prefix(?string $name = null)
 *
 * @see \Trippodi\TallStackUi\TallStackUi
 */
class TallStackUi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'TallStackUiTrippodi';
    }
}
