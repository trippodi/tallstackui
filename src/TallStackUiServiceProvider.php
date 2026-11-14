<?php

namespace Trippodi\TallStackUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Trippodi\Trippodi\TallStackUi\Components\Icon\Component as Icon;
use Trippodi\Trippodi\TallStackUi\Console\AsyncUploadClearCommand;
use Trippodi\Trippodi\TallStackUi\Console\FindComponentCommand;
use Trippodi\Trippodi\TallStackUi\Console\IdeCommand;
use Trippodi\Trippodi\TallStackUi\Console\SetupColorCommand;
use Trippodi\Trippodi\TallStackUi\Console\SetupPrefixCommand;
use Trippodi\Trippodi\TallStackUi\Customization\CustomizationFactory;
use Trippodi\Trippodi\TallStackUi\Support\Blade\ComponentPrefix;
use Trippodi\Trippodi\TallStackUi\Support\Blade\Directives;
use Trippodi\Trippodi\TallStackUi\Support\Breadcrumbs\BreadcrumbRegistry;

include __DIR__.'/helpers.php';

class TallStackUiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishable();

        $this->registerComponents();

        $this->registerComponentCustomization();

        $this->registerCommands();

        $this->registerBreadcrumbs();

        $this->registerPredefinedScopes();

        Directives::register();
    }

    public function register(): void
    {
        $this->registerConfig();

        $this->app->singleton('TallStackUiTrippodi', TallStackUi::class);

        $this->app->singleton(BreadcrumbRegistry::class);
    }

    protected function registerBreadcrumbs(): void
    {
        $configuration = __tst_get_component_configuration(Components\Breadcrumbs\Component::class);

        if (! $configuration || empty($configuration['files'])) {
            return;
        }

        foreach ($configuration['files'] as $path) {
            $file = base_path($path);

            if (file_exists($file)) {
                require $file;
            }
        }
    }

    protected function registerCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            SetupPrefixCommand::class,
            FindComponentCommand::class,
            SetupColorCommand::class,
            IdeCommand::class,
            AsyncUploadClearCommand::class,
        ]);
    }

    protected function registerComponentCustomization(): void
    {
        // This ternary was needed to avoid exceptions when BladeUi is not installed in the base project.
        Blade::component(class_exists(\BladeUI\Icons\Components\Icon::class) ? 'BladeUI\Icons\Components\Icon' : Icon::class, 'tst-blade-ui');

        foreach (__tst_soft_customization_components() as $key => $class) {
            $this->app->singleton($key, fn () => new CustomizationFactory($class));
        }
    }

    protected function registerComponents(): void
    {
        $components = config('ts-ui-trippodi.components');
        $configuration = config('ts-ui-trippodi.components.layout')[1];

        if ($configuration['ignore'] === true) {
            $components = array_filter(config('ts-ui-trippodi.components'), fn (string|array $component) => ! str_contains(is_array($component) ? $component[0] : $component, 'Layout'));
        }

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) use ($components): void {
            foreach ($components as $name => $class) {
                $class = is_array($class) ? $class[0] : $class;

                $blade->component($class, app(ComponentPrefix::class)->add($name));
            }
        });
    }

    protected function registerConfig(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'ts-ui-trippodi');

        $this->mergeConfigFrom(__DIR__.'/config.php', 'ts-ui-trippodi');

        // The config is published as 'tallstackui' but used internally as 'ts-ui-trippodi'.
        // We merge published values so user customizations take effect.
        if ($published = config('tallstackui-trippodi')) {
            config(['ts-ui-trippodi' => __tst_merge_configuration(config('ts-ui-trippodi'), $published)]);
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'ts-ui-trippodi');
    }

    protected function registerPublishable(): void
    {
        $this->publishes([__DIR__.'/config.php' => config_path('tallstackui-trippodi.php')], 'tallstackui-trippodi.config');

        $this->publishes([__DIR__.'/../lang' => lang_path('vendor/ts-ui-trippodi')], 'tallstackui-trippodi.lang');

        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/ts-ui-trippodi')], 'tallstackui-trippodi.views');

        $this->publishes([__DIR__.'/Support/Breadcrumbs/stubs/breadcrumbs.php.stub' => base_path('routes/breadcrumbs.php')], 'tallstackui-trippodi.breadcrumbs');
    }

    private function registerPredefinedScopes(): void
    {
        $this->app[TallStackUi::class]->customize()
            // card
            ->scope('card-shadowless')
            ->card()
            ->block('wrapper.second')
            ->remove('shadow-md')
            ->append('border border-gray-200 dark:border-dark-600')
            ->and()
            // stats
            ->scope('stats-shadowless')
            ->stats()
            ->block('wrapper.first')
            ->remove('shadow-md')
            ->append('border border-gray-200 dark:border-dark-600')
            ->and()
            // calendar
            ->scope('calendar-shadowless')
            ->calendar()
            ->block('wrapper.body')
            ->remove('shadow-md')
            ->append('border border-gray-200 dark:border-dark-600')
            ->and()
            // tab
            ->scope('tab-shadowless')
            ->tab()
            ->block('base.wrapper')
            ->remove('shadow-md')
            ->append('border border-gray-300');
    }
}
