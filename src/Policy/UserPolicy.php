<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\Identity;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy
{
    /**
     * Check if $user can edit User
     *
     * @param IdentityInterface $user The user.
     * @param User $resource
     *
     * @return bool
     */
    public function canEdit(Identity $user, User $resource): bool
    {
        return $user->id === $resource->id;
    }

    /**
     * Check if $user can delete User
     *
     * @param IdentityInterface $user The user.
     * @param User $resource
     *
     * @return bool
     */
    public function canDelete(Identity $user, User $resource)
    {
        return $user->id === 1;
    }

    /**
     * Check if $user can view User
     *
     * @param IdentityInterface $user The user.
     * @param User $resource
     *
     * @return bool
     */
    public function canView(Identity $user, User $resource)
    {
        return $user->id === $resource->id;
    }
}
