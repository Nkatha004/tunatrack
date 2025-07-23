<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\Response;
use App\Utils\AppUtils;
use App\Utils\AppPermissions;

class VehiclePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return AppUtils::isAdmin() || $user->hasPermissionTo(AppPermissions::READ_VEHICLES_PERMISSION);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vehicle $vehicle): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::READ_VEHICLES_PERMISSION) && $user->company_id === $vehicle->company_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return AppUtils::isAdmin() || $user->hasPermissionTo(AppPermissions::CREATE_VEHICLES_PERMISSION);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vehicle $vehicle): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::UPDATE_VEHICLES_PERMISSION) && $user->company_id === $vehicle->company_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vehicle $vehicle): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::DELETE_VEHICLES_PERMISSION) && $user->company_id === $vehicle->company_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vehicle $vehicle): bool
    {
        return AppUtils::isAdmin() || 
        ($user->hasPermissionTo(AppPermissions::RESTORE_VEHICLES_PERMISSION) && $user->company_id === $vehicle->company_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vehicle $vehicle): bool
    {
        return AppUtils::isAdmin();
    }
}
