<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Authorization\Identity;
use Authorization\Policy\Result;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function canIndex(Identity $identity, UsersTable $query): Result
    {
        /** @var User $authUser */
        $authUser = $identity->getOriginalData();

        if ($authUser->is_admin) {
            return new Result(true);
        } else {
            return new Result(false);
        }
    }
}
