<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateGroupsUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('groups_users');
        $table->addColumn('group_id', 'integer');
        $table->addForeignKey(
            'group_id',
            'groups',
            'id'
        );
        $table->addColumn('user_id', 'integer');
        $table->addForeignKey(
            'user_id',
            'users',
            'id'
        );

        $table->create();
    }
}
