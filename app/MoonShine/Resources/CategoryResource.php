<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Category>
 */
class CategoryResource extends ModelResource{
    protected string $model = Category::class;
    protected string $title = 'Categorias';
    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailModal = true;
    protected bool $withPolicy = true;
    public function redirectAfterSave(): string{
        $refer = Request::header('referer');
        return $refer ?: '/';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array{
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre', 'name'),
                Text::make('Descripcion', 'description'),
            ]),
        ];
    }

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array{
        return [];
    }
}
