<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
$this->assign('title', "Блог от Nemial | $article->title")
?>
<aside class="container-sm mb-3">
    <h3 class="heading"><?= __('Действия') ?></h3>
    <?= $this->Html->link(__('Обновить'), ['action' => 'edit', $article->id], [
        'class'
        => 'link-success me-1',
    ]) ?>
    <?= $this->Form->postLink(
        __('Удалить'),
        ['action' => 'delete', $article->id],
        [
            'confirm' => __('Вы уверены что хотите удалить #{0}?', $article->id),
            'class' => 'link-danger
    me-1',
        ]
    )
    ?>
    <?= $this->Html->link(__('Список статей'), ['action' => 'index'], [
        'class' =>
            'link-dark me-1',
    ]) ?>
    <?= $this->Html->link(__('Добавить статью'), ['action' => 'add'], [
        'class' =>
            'link-info',
    ]) ?>
</aside>
<div class="container-sm d-flex flex-column justify-content-start">
    <div class="my-5 text-center">
        <h1><?= h($article->title) ?></h1>
        <div class="mt-4 ">
            <?= $article->body ?>
        </div>
    </div>
    <table class="table w-50">
        <tr class="table-info">
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr class="table-danger">
            <th><?= __('Дата создания') ?></th>
            <td><?= h($article->created_at) ?></td>
        </tr>
        <tr class="table-danger">
            <th><?= __('Дата обновления') ?></th>
            <td><?= h($article->updated_at) ?></td>
        </tr>
        <tr class="table-primary">
            <th><?= __('Автор') ?></th>
            <td>
                <?= $this->Html->link(
                    h($article->user->email),
                    ['controller' => 'Users', 'action' => 'view', $article->user->id],
                    ['class' => 'link-dark']
                ) ?>
            </td>
        </tr>
    </table>
</div>
