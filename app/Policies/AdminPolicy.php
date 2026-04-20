<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Разрешить просмотр всех моделей любым авторизованным пользователям.
     */
    public function viewAny(User $user): bool
    {
        return $user !== null;
    }

    /**
     * Разрешить просмотр отдельной модели любым авторизованным пользователям.
     */
    public function view(User $user, User $model): bool
    {
        return $user !== null;
    }

    /**
     * Разрешить создание моделей любым авторизованным пользователям.
     */
    public function create(User $user): bool
    {
        return $user !== null;
    }

    /**
     * Разрешить обновление моделей только администраторам.
     */
    public function update(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Разрешить удаление моделей только администраторам.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Разрешить восстановление моделей только администраторам.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Разрешить окончательное удаление моделей только администраторам.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }
}
