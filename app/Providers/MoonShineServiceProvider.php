<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\BrandResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\ProductResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('Configuraciones'), [
                MenuItem::make(
                    static fn() => __('Usuarios'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('Roles'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            MenuItem::make('Marcas', new BrandResource)->icon('heroicons.outline.rectangle-group'),
            MenuItem::make('Categorias', new CategoryResource)->icon('heroicons.outline.share'),
            MenuItem::make('Productos', new ProductResource)->icon('heroicons.outline.shopping-bag'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
