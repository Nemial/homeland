<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\Identity;

/**
 * User policy
 */
class UserPolicy
{
    /**
     * Check if $user can edit User
     *
     * @param Identity $identity
     * @param User $user
     *
     * @return bool
     */
    public function canEdit(Identity $identity, User $user): bool
    {
        /** @var User $authUser */
        $authUser = $identity->getOriginalData();
        return $authUser->id === $user->id || $authUser->is_admin;
    }

    /**
     * Check if $user can delete User
     *
     * @param Identity $identity The user.
     * @param User $user
     *
     * @return bool
     */
    public function canDelete(Identity $identity, User $user): bool
    {
        /** @var User $authUser */
        $authUser = $identity->getOriginalData();
        return $authUser->is_admin;
    }

    /**
     * Check if $user can view User
     *
     * @param Identity $identity The user.
     * @param User $user
     *
     * @return bool
     */
    public function canView(Identity $identity, User $user): bool
    {
        /** @var User $authUser */
        $authUser = $identity->getOriginalData();
        return $authUser->is_admin || $authUser->id === $user->id;
    }

    public function canAdd(Identity $identity, User $user): bool
    {
        /** @var User $authUser */
        $authUser = $identity->getOriginalData();
        return $authUser->is_admin;
    }
}
