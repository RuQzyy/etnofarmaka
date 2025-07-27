<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemKeranjang;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemKeranjangPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ItemKeranjang $itemKeranjang): bool
    {
        return $user->id === $itemKeranjang->keranjang->id_user;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ItemKeranjang $itemKeranjang): bool
    {
        return $user->id === $itemKeranjang->keranjang->id_user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ItemKeranjang $itemKeranjang): bool
    {
        return $user->id === $itemKeranjang->keranjang->id_user;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ItemKeranjang $itemKeranjang): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ItemKeranjang $itemKeranjang): bool
    {
        return false;
    }
}
