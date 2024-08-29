<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Brand;
use MoonShine\Models\MoonshineUser;

class BrandPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, Brand $item): bool
    {
        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, Brand $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, Brand $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, Brand $item): bool
    {
        return true;
    }

    public function forceDelete(MoonshineUser $user, Brand $item): bool
    {
        return true;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return true;
    }
}
