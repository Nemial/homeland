<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->assign('title', 'Пользователи')
?>
<div class="container-lg">
    <div class="d-flex justify-content-between">
        <h1><?= __('Пользователи') ?></h1>
        <a class="align-self-center" href="<?= $this->Url->buildFromPath('Users::add') ?>"><?= __(
                'Добавить пользователя'
            ) ?>
        </a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr class="text-center">
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
            <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= __('Действия') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user): ?>
            <tr class="text-center">
                <th scope="row"><?= $this->Number->format($user->id) ?></th>
                <td><?= h($user->created_at) ?></td>
                <td><?= h($user->updated_at) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="d-flex justify-content-around">
                    <?= $this->Html->link(__('Просмотр'), ['action' => 'view', $user->id], [
                        'class' => 'link-dark',
                    ]) ?>
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
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container d-flex align-items-center flex-column mt-2">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ',) ?>
        <?= $this->Paginator->prev(__('--i')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('++i')) ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
</div>
