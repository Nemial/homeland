<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Cake\ORM\Query;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function canIndex(IdentityInterface $user, UsersTable $query): Result
    {
        if ($user->id === 1) {
            return new Result(true);
        } else {
            return new Result(false);
        }
    }
}
