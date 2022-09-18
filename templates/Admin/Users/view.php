<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', "Пользователь #{$user->id}")
?>
<aside class="mb-3">
    <h3><?= __('Действия') ?></h3>
    <?= $this->Html->link(
        __('Обновить'),
        ['action' => 'edit', $user->id],
        ['class' => 'link-success me-1']
    ) ?>
    <?= $this->Form->postLink(
        __('Удалить'),
        ['action' => 'delete', $user->id],
        [
            'confirm' => __('Вы уверены, что хотите удалить # {0}?', $user->id),
            'class' => 'link-danger me-1',
        ]
    ) ?>
    <?= $this->Html->link(
        __('Список'),
        ['action' => 'index'],
        ['class' => 'link-dark me-1']
    ) ?>
    <?= $this->Html->link(__('Создать'), ['action' => 'add'], ['class' => 'link-info']
    ) ?>
</aside>
<div class="d-flex flex-column justify-content-start">
    <h2>#<?= h($user->id) ?></h2>
    <table class="table">
        <tr class="table-primary">
            <th><?= __('Логин') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr class="table-info">
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr class="table-primary">
            <th><?= __('Id') ?></th>
            <td><?= h($this->Number->format($user->id)) ?></td>
        </tr>
        <tr class="table-danger">
            <th><?= __('Created At') ?></th>
            <td><?= h($user->created_at) ?></td>
        </tr>
        <tr class="table-danger">
            <th><?= __('Updated At') ?></th>
            <td><?= h($user->updated_at) ?></td>
        </tr>
        <tr class="table-dark">
            <th><?= __('Группы') ?></th>
            <td><?= h($user->group_string) ?></td>
        </tr>
    </table>
</div>
