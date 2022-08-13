<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', "Пользователь #{$user->id}")
?>
<div class="container">
    <aside class="container-sm mb-3">
        <h4><?= __('Действия') ?></h4>
        <?= $this->Html->link(
            __('Обновить'),
            ['action' => 'edit', $user->id],
            ['class' => 'link-success']
        ) ?>
        <?= $this->Form->postLink(
            __('Удалить'),
            ['action' => 'delete', $user->id],
            [
                'confirm' => __('Вы уверены, что хотите удалить # {0}?', $user->id),
                'class' => 'link-danger',
            ]
        ) ?>
        <?= $this->Html->link(
            __('Список'),
            ['action' => 'index'],
            ['class' => 'link-dark']
        ) ?>
        <?= $this->Html->link(__('Создать'), ['action' => 'add'], ['class' => 'link-info']
        ) ?>
    </aside>
    <div class="container-sm d-flex flex-column justify-content-start">
        <h2>#<?= h($user->id) ?></h2>
        <table class="table">
            <tr class="table-info">
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr class="table-primary">
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr class="table-danger">
                <th><?= __('Created At') ?></th>
                <td><?= h($user->created_at) ?></td>
            </tr>
            <tr class="table-danger">
                <th><?= __('Updated At') ?></th>
                <td><?= h($user->updated_at) ?></td>
            </tr>
        </table>
    </div>
</div>
