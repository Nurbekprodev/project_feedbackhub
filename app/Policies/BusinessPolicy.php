<?php

namespace App\Policies;

use App\Models\Business;
use App\Models\User;

class BusinessPolicy
{
    /**
     * Any authenticated user can view their business
     */
    public function view(User $user, Business $business): bool
    {
        return $user->id === $business->user_id;
    }

    /**
     * Update permission
     */
    public function update(User $user, Business $business): bool
    {
        return $user->id === $business->user_id;
    }

    /**
     * Delete permission
     */
    public function delete(User $user, Business $business): bool
    {
        return $user->id === $business->user_id;
    }

    /**
     * Edit permission (optional, but useful for clarity)
     */
    public function edit(User $user, Business $business): bool
    {
        return $user->id === $business->user_id;
    }
}