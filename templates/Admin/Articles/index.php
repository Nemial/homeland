<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
$this->assign('title', 'Статьи')
?>
<div class="d-flex flex-column justify-content-between">
    <div class="d-flex justify-content-between">
        <h1><?= __('Статьи') ?></h1>
        <?= $this->Html->link(__('Добавить статью'), ['action' => 'add'], [
            'class' => 'align-self-center',
        ]) ?>
    </div>
    <table class="table">

        <thead>
        <tr class="text-center">
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title', 'Название') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created_at', 'Дата создания') ?></th>
            <th scope="col"><?= $this->Paginator->sort('updated_at', 'Дата изменения') ?></th>
            <th scope="col"><?= __('Действия') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($articles as $article): ?>
            <tr class="text-center">
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created_at) ?></td>
                <td><?= h($article->updated_at) ?></td>
                <td class="d-flex justify-content-around">
                    <?= $this->Html->link(__('Просмотр'), ['action' => 'view', $article->id], [
                        'class' =>
                            'link-dark',
                    ]) ?>
                    <?= $this->Html->link(__('Обновить'), ['action' => 'edit', $article->id], [
                        'class' =>
                            'link-success',
                    ]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $article->id], [
                        'confirm'
                        => __('Вы уверены, что хотите удалить # {0}?', $article->id),
                        'class' => 'link-danger',
                    ])
                    ?>
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
