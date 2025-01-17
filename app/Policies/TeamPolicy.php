<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, Team $team): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Team $team): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can delete the model.
     *
     * Se verifica que el usuario sea el propietario del equipo y que tenga más de un equipo.
     */
    public function delete(User $user, Team $team): bool
    {
        return $user->id === $team->owner_id && $user->ownedTeams()->count() > 1;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Team $team): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Team $team): bool
    // {
    //     //
    // }
}
