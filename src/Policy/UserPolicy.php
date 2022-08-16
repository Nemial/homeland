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
     * @param IdentityInterface $iden The user.
     * @param User $user
     *
     * @return bool
     */
    public function canEdit(Identity $identity, User $user): bool
    {
        return $identity->getIdentifier() === $user->id || $user->is_admin;
    }

    /**
     * Check if $user can delete User
     *
     * @param IdentityInterface $identity The user.
     * @param User $user
     *
     * @return bool
     */
    public function canDelete(Identity $identity, User $user)
    {
        return $user->is_admin;
    }

    /**
     * Check if $user can view User
     *
     * @param IdentityInterface $identity The user.
     * @param User $user
     *
     * @return bool
     */
    public function canView(Identity $identity, User $user)
    {
        return $user->is_admin || $identity->getIdentifier() === $user->id;
    }
}
