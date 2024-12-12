<?php

namespace App\Policies;

use App\Models\IwoOrder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IwoOrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEntry() || $user->isUser();
        }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, IwoOrder $iwoOrder): bool
    {
        return $user->isAdmin() || $user->isEntry() || $user->isUser();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEntry();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IwoOrder $iwoOrder): bool
    {
        return $user->isAdmin() || $user->isEntry();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IwoOrder $iwoOrder): bool
    {
        return $user->isAdmin() || $user->isEntry();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IwoOrder $iwoOrder): bool
    {
        return $user->isAdmin() || $user->isEntry();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IwoOrder $iwoOrder): bool
    {
        return $user->isAdmin() || $user->isEntry();
    }
}
