<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
$this->assign('title', 'Статьи')
?>
<ul class="d-flex flex-column list-unstyled">
    <?php
    foreach ($articles as $article): ?>
    <li>
        <p>
            <?=$article->title?>
        </p>
        <p>
        <?=$article->created_at?>
        </p>
        <p>
        <?=$article->user->email?>
        </p>
    </li>
    <?php
    endforeach; ?>
</ul>
<div class="container d-flex align-items-center flex-column mt-2">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ',) ?>
        <?= $this->Paginator->prev(__('--i')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('++i')) ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
</div>
