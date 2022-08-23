<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('articles')->addTimestamps();
        $table->addColumn('title', 'string', ['limit' => 60]);
        $table->addColumn('body', 'text');
        $table->addColumn('user_id', 'integer');
        $table->addForeignKey(
            'user_id',
            'users',
            'id'
        );
        $table->create();
    }
}
