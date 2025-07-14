<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Utils\AppUtils;
use App\Utils\AppPermissions;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return AppUtils::isAdmin() || $user->hasPermissionTo(AppPermissions::READ_USERS_PERMISSION);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::READ_USERS_PERMISSION) && $user->company_id === $model->company_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return AppUtils::isAdmin() || $user->hasPermissionTo(AppPermissions::CREATE_USERS_PERMISSION);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::UPDATE_USERS_PERMISSION) && $user->company_id === $model->company_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::DELETE_USERS_PERMISSION) && $user->company_id === $model->company_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::RESTORE_USERS_PERMISSION) && $user->company_id === $model->company_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return AppUtils::isAdmin();
    }
}
