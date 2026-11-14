<?php

namespace Trippodi\Trippodi\TallStackUi\Customization;

use InvalidArgumentException;
use ReflectionMethod;
use RuntimeException;
use Trippodi\Trippodi\TallStackUi\Components\Accordion\Items\Component as AccordionItems;
use Trippodi\Trippodi\TallStackUi\Components\Accordion\Main\Component as Accordion;
use Trippodi\Trippodi\TallStackUi\Components\Alert\Component as Alert;
use Trippodi\Trippodi\TallStackUi\Components\Avatar\Component as Avatar;
use Trippodi\Trippodi\TallStackUi\Components\Avatar\Group\Component as AvatarGroup;
use Trippodi\Trippodi\TallStackUi\Components\BackToTop\Component as BackToTop;
use Trippodi\Trippodi\TallStackUi\Components\Badge\Component as Badge;
use Trippodi\Trippodi\TallStackUi\Components\Banner\Component as Banner;
use Trippodi\Trippodi\TallStackUi\Components\Boolean\Component as Boolean;
use Trippodi\Trippodi\TallStackUi\Components\Breadcrumbs\Component as Breadcrumbs;
use Trippodi\Trippodi\TallStackUi\Components\Button\Circle\Component as Circle;
use Trippodi\Trippodi\TallStackUi\Components\Button\Group\Component as ButtonGroup;
use Trippodi\Trippodi\TallStackUi\Components\Button\Normal\Component as Button;
use Trippodi\Trippodi\TallStackUi\Components\Calendar\Component as Calendar;
use Trippodi\Trippodi\TallStackUi\Components\Card\Component as Card;
use Trippodi\Trippodi\TallStackUi\Components\Carousel\Component as Carousel;
use Trippodi\Trippodi\TallStackUi\Components\Chart\Component as Chart;
use Trippodi\Trippodi\TallStackUi\Components\Clipboard\Component as Clipboard;
use Trippodi\Trippodi\TallStackUi\Components\CommandPalette\Component as CommandPalette;
use Trippodi\Trippodi\TallStackUi\Components\Dial\Items\Component as DialItems;
use Trippodi\Trippodi\TallStackUi\Components\Dial\Main\Component as Dial;
use Trippodi\Trippodi\TallStackUi\Components\Dialog\Component as Dialog;
use Trippodi\Trippodi\TallStackUi\Components\Dropdown\Items\Component as DropdownItems;
use Trippodi\Trippodi\TallStackUi\Components\Dropdown\Main\Component as Dropdown;
use Trippodi\Trippodi\TallStackUi\Components\Dropdown\Submenu\Component as DropdownSubmenu;
use Trippodi\Trippodi\TallStackUi\Components\Editor\Component as Editor;
use Trippodi\Trippodi\TallStackUi\Components\Environment\Component as Environment;
use Trippodi\Trippodi\TallStackUi\Components\Errors\Component as Errors;
use Trippodi\Trippodi\TallStackUi\Components\Floating\Component as Floating;
use Trippodi\Trippodi\TallStackUi\Components\Form\Autocomplete\Component as Autocomplete;
use Trippodi\Trippodi\TallStackUi\Components\Form\Checkbox\Component as Checkbox;
use Trippodi\Trippodi\TallStackUi\Components\Form\Checkbox\Group\Component as CheckboxGroup;
use Trippodi\Trippodi\TallStackUi\Components\Form\Color\Component as Color;
use Trippodi\Trippodi\TallStackUi\Components\Form\Currency\Component as Currency;
use Trippodi\Trippodi\TallStackUi\Components\Form\Date\Component as Date;
use Trippodi\Trippodi\TallStackUi\Components\Form\Error\Component as Error;
use Trippodi\Trippodi\TallStackUi\Components\Form\Hint\Component as Hint;
use Trippodi\Trippodi\TallStackUi\Components\Form\Input\Component as Input;
use Trippodi\Trippodi\TallStackUi\Components\Form\InputSelect\Component as InputSelect;
use Trippodi\Trippodi\TallStackUi\Components\Form\Label\Component as Label;
use Trippodi\Trippodi\TallStackUi\Components\Form\Number\Component as Number;
use Trippodi\Trippodi\TallStackUi\Components\Form\Password\Component as Password;
use Trippodi\Trippodi\TallStackUi\Components\Form\Pin\Component as Pin;
use Trippodi\Trippodi\TallStackUi\Components\Form\Radio\Component as Radio;
use Trippodi\Trippodi\TallStackUi\Components\Form\Radio\Group\Component as RadioGroup;
use Trippodi\Trippodi\TallStackUi\Components\Form\Range\Component as Range;
use Trippodi\Trippodi\TallStackUi\Components\Form\Select\Native\Component as SelectNative;
use Trippodi\Trippodi\TallStackUi\Components\Form\Select\Styled\Component as SelectStyled;
use Trippodi\Trippodi\TallStackUi\Components\Form\Tag\Component as Tag;
use Trippodi\Trippodi\TallStackUi\Components\Form\Textarea\Component as Textarea;
use Trippodi\Trippodi\TallStackUi\Components\Form\Time\Component as Time;
use Trippodi\Trippodi\TallStackUi\Components\Form\Toggle\Component as Toggle;
use Trippodi\Trippodi\TallStackUi\Components\Form\Upload\Async\Component as UploadAsync;
use Trippodi\Trippodi\TallStackUi\Components\Form\Upload\Component as Upload;
use Trippodi\Trippodi\TallStackUi\Components\Gallery\Component as Gallery;
use Trippodi\Trippodi\TallStackUi\Components\Icon\Component as Icon;
use Trippodi\Trippodi\TallStackUi\Components\Kbd\Component as Kbd;
use Trippodi\Trippodi\TallStackUi\Components\KeyValue\Component as KeyValue;
use Trippodi\Trippodi\TallStackUi\Components\Layout\Header\Component as Header;
use Trippodi\Trippodi\TallStackUi\Components\Layout\Main\Component as Layout;
use Trippodi\Trippodi\TallStackUi\Components\Layout\SideBar\Item\Component as SideBarItem;
use Trippodi\Trippodi\TallStackUi\Components\Layout\SideBar\Main\Component as SideBar;
use Trippodi\Trippodi\TallStackUi\Components\Layout\SideBar\Separator\Component as Separator;
use Trippodi\Trippodi\TallStackUi\Components\Link\Component as Link;
use Trippodi\Trippodi\TallStackUi\Components\List\Items\Component as ListItems;
use Trippodi\Trippodi\TallStackUi\Components\List\Main\Component as TsList;
use Trippodi\Trippodi\TallStackUi\Components\Loading\Component as Loading;
use Trippodi\Trippodi\TallStackUi\Components\Modal\Component as Modal;
use Trippodi\Trippodi\TallStackUi\Components\Progress\Bar\Component as Progress;
use Trippodi\Trippodi\TallStackUi\Components\Progress\Circle\Component as ProgressCircle;
use Trippodi\Trippodi\TallStackUi\Components\QrCode\Component as QrCode;
use Trippodi\Trippodi\TallStackUi\Components\Rating\Component as Rating;
use Trippodi\Trippodi\TallStackUi\Components\Reaction\Component as Reaction;
use Trippodi\Trippodi\TallStackUi\Components\Signature\Component as Signature;
use Trippodi\Trippodi\TallStackUi\Components\Slide\Component as Slide;
use Trippodi\Trippodi\TallStackUi\Components\Spinner\Component as Spinner;
use Trippodi\Trippodi\TallStackUi\Components\Stats\Component as Stats;
use Trippodi\Trippodi\TallStackUi\Components\Step\Main\Component as Step;
use Trippodi\Trippodi\TallStackUi\Components\Swap\Component as Swap;
use Trippodi\Trippodi\TallStackUi\Components\Tab\Main\Component as Tab;
use Trippodi\Trippodi\TallStackUi\Components\Table\Component as Table;
use Trippodi\Trippodi\TallStackUi\Components\ThemeSwitch\Component as ThemeSwitch;
use Trippodi\Trippodi\TallStackUi\Components\Timeline\Items\Component as TimelineItems;
use Trippodi\Trippodi\TallStackUi\Components\Timeline\Main\Component as Timeline;
use Trippodi\Trippodi\TallStackUi\Components\Toast\Component as Toast;
use Trippodi\Trippodi\TallStackUi\Components\Tooltip\Component as Tooltip;
use Trippodi\Trippodi\TallStackUi\Components\Wrapper\Input\Component as InputWrapper;
use Trippodi\Trippodi\TallStackUi\Components\Wrapper\Radio\Component as RadioWrapper;

/**
 * @internal
 */
class Customization
{
    /**
     * Whether the next component call should reuse an already defined scope.
     */
    private bool $extending = false;

    public function __construct(public ?string $component = null, public ?string $scope = null)
    {
        //
    }

    public function accordion(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'accordion';

        $class = match ($component) {
            'accordion' => Accordion::class,
            'items' => AccordionItems::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function alert(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Alert::class);
    }

    public function avatar(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'avatar';

        $class = match ($component) {
            'avatar' => Avatar::class,
            'group' => AvatarGroup::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function backToTop(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(BackToTop::class);
    }

    public function badge(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Badge::class);
    }

    public function banner(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Banner::class);
    }

    /**
     * Interact with the block to start the personalization.
     */
    public function block(string|array $name, string|callable|null $code = null): CustomizationFactory
    {
        return $this->forward()->block($name, $code);
    }

    public function boolean(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Boolean::class);
    }

    public function breadcrumbs(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Breadcrumbs::class);
    }

    public function button(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $component ??= 'button';

        $this->scope ??= $scope;

        $class = match ($component) {
            'button' => Button::class,
            'circle' => Circle::class,
            'group' => ButtonGroup::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function calendar(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Calendar::class);
    }

    public function card(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Card::class);
    }

    public function carousel(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Carousel::class);
    }

    public function chart(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Chart::class);
    }

    public function clipboard(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Clipboard::class);
    }

    public function commandPalette(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(CommandPalette::class);
    }

    public function dial(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'dial';

        $class = match ($component) {
            'dial' => Dial::class,
            'items' => DialItems::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function dialog(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Dialog::class);
    }

    public function dropdown(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'dropdown';

        $class = match ($component) {
            'dropdown' => Dropdown::class,
            'submenu' => DropdownSubmenu::class,
            'items' => DropdownItems::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function editor(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Editor::class);
    }

    public function environment(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Environment::class);
    }

    public function errors(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Errors::class);
    }

    /**
     * Reuse a scope that has already been defined, so that its blocks
     * can be changed instead of being redefined from the original classes.
     */
    public function extend(string $scope): self
    {
        $this->scope = $scope;
        $this->extending = true;

        return $this;
    }

    public function floating(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Floating::class);
    }

    public function form(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'input';

        $class = match ($component) {
            'autocomplete' => Autocomplete::class,
            'checkbox' => Checkbox::class,
            'checkbox.group' => CheckboxGroup::class,
            'color' => Color::class,
            'currency' => Currency::class,
            'date' => Date::class,
            'error' => Error::class,
            'hint' => Hint::class,
            'input' => Input::class,
            'input.select' => InputSelect::class,
            'label' => Label::class,
            'number' => Number::class,
            'upload' => Upload::class,
            'upload.async' => UploadAsync::class,
            'password' => Password::class,
            'pin' => Pin::class,
            'range' => Range::class,
            'radio' => Radio::class,
            'radio.group' => RadioGroup::class,
            'tag' => Tag::class,
            'textarea' => Textarea::class,
            'time' => Time::class,
            'toggle' => Toggle::class,
            default => $component,
        };

        return $this->component($class);
    }

    /**
     * The purpose of this function is to forward the execution of
     * the methods as they are called from auxiliary methods, such
     * as "form('input')", where in this example 'form' would be
     * the method and 'input' the parameter to be injected into the method.
     */
    public function forward(): CustomizationFactory
    {
        if (! $this->component) {
            throw new RuntimeException('No component has been set');
        }

        if (str_contains($this->component, 'ts-ui-trippodi::customization')) {
            $this->component = str_replace('ts-ui-trippodi::customization.', '', $this->component);
        }

        // This is necessary for cases where personalization aims to
        // manipulate components like form.number. We explode to get
        // the namespace - form, and the component - number. For deeper
        // keys like form.input.select, we join the remaining parts.
        $parts = explode('.', $this->component);

        $main = $parts[0];
        $secondary = count($parts) > 2
            ? implode('.', array_slice($parts, 1))
            : ($parts[1] ?? null);

        if (! method_exists($this, $main)) {
            throw new RuntimeException("The method [{$main}] is not supported");
        }

        // Only the methods that expose a $component parameter accept a
        // sub-component. Without this guard the extra segment would land
        // on $scope and quietly create a scope nobody asked for.
        if ($secondary !== null && (new ReflectionMethod($this, $main))->getParameters()[0]->getName() !== 'component') {
            throw new RuntimeException("The component [{$main}] does not have the sub-component [{$secondary}]");
        }

        return call_user_func([$this, $main], $secondary);
    }

    public function gallery(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Gallery::class);
    }

    public function globals(): Globals
    {
        return new Globals;
    }

    public function icon(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Icon::class);
    }

    public function kbd(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Kbd::class);
    }

    public function keyValue(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(KeyValue::class);
    }

    public function layout(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $component ??= 'index';

        $this->scope ??= $scope;

        $class = match ($component) {
            'index' => Layout::class,
            'header' => Header::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function link(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Link::class);
    }

    public function list(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'list';

        $class = match ($component) {
            'list' => TsList::class,
            'items' => ListItems::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function loading(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Loading::class);
    }

    public function modal(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Modal::class);
    }

    public function progress(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'progress';

        $class = match ($component) {
            'progress' => Progress::class,
            'circle' => ProgressCircle::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function qrCode(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(QrCode::class);
    }

    public function rating(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Rating::class);
    }

    public function reaction(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Reaction::class);
    }

    /**
     * Set the scope for the personalization.
     *
     * @param  $name  string
     */
    public function scope(string $name): self
    {
        $this->scope = $name;

        return $this;
    }

    public function select(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'native';

        $class = match ($component) {
            'native' => SelectNative::class,
            'styled' => SelectStyled::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function sideBar(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $component ??= 'side-bar';

        $this->scope ??= $scope;

        $class = match ($component) {
            'side-bar' => SideBar::class,
            'item' => SideBarItem::class,
            'separator' => Separator::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function signature(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Signature::class);
    }

    public function slide(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Slide::class);
    }

    public function spinner(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Spinner::class);
    }

    public function stats(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Stats::class);
    }

    public function step(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Step::class);
    }

    public function swap(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Swap::class);
    }

    public function tab(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Tab::class);
    }

    public function table(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Table::class);
    }

    public function themeSwitch(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(ThemeSwitch::class);
    }

    public function timeline(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'timeline';

        $class = match ($component) {
            'timeline' => Timeline::class,
            'items' => TimelineItems::class,
            default => $component,
        };

        return $this->component($class);
    }

    public function toast(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Toast::class);
    }

    public function tooltip(?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        return $this->component(Tooltip::class);
    }

    public function wrapper(?string $component = null, ?string $scope = null): CustomizationFactory
    {
        $this->scope ??= $scope;

        $component ??= 'input';

        $class = match ($component) {
            'input' => InputWrapper::class,
            'radio' => RadioWrapper::class,
            default => $component,
        };

        return $this->component($class);
    }

    /**
     * Searches for the component from the list of all components using the customization attribute.
     */
    private function component(string $class): string|CustomizationFactory
    {
        $component = __tst_search_component($class);

        // This is the strategy adopted for scope personalization. We create a temporary
        // key in the Laravel container, and instead of returning the same instance - which
        // would normally happen, as in v1, we return a new instance of PersonalizationResources.
        if (($scope = $this->scope) !== null) {
            $this->scope = null; // Resetting the scope to avoid infinite recursion.

            $key = __tst_scope_container_key($component, $scope);

            if ($this->extending) {
                $this->extending = false;

                if (! app()->bound($key)) {
                    $name = str_replace('ts-ui-trippodi::customization.', '', $component);

                    throw new InvalidArgumentException("The scope [$scope] was not defined for the component [$name] and therefore cannot be extended.");
                }

                return app($key);
            }

            $instance = new CustomizationFactory($class, scope: $scope);

            app()->singleton($key, fn () => $instance);

            return $instance;
        }

        return app($component);
    }
}
