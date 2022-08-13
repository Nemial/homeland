<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\Identity;
use Authorization\Policy\Result;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function canIndex(Identity $user, UsersTable $query): Result
    {
        if ($user->id === 1) {
            return new Result(true);
        } else {
            return new Result(false);
        }
    }
}
