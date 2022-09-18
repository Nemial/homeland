<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
$this->assign('title', 'Статьи')
?>
<h1 class="text-white">Статьи</h1>
<ul class="d-flex flex-column list-unstyled text-white align-items-center">
    <?php
    foreach ($articles as $article): ?>
        <li class="border border-opacity-25 border-3 border-white p-4">
            <p class="m-0 fs-3 text-end">
                #<?=h($article->id)?>
            </p>
            <h2 class="mb-5 mt-2">
                <?= $this->Html->link(
                    h($article->title),
                    ['action' => 'view', $article->id],
                    ['class' => 'link-light']
                ) ?>
            </h2>
            <div class="info d-flex justify-content-between">
                <p class="m-0">
                    Автор <span class="text-teal-light fst-italic"><?= $article->user->email ?></span>
                </p>
                <p class="m-0">
                    Дата <span class="text-blue-light fst-italic"><?= $article->created_at->format(
                            'Y.m.d'
                        ) ?></span>
                </p>
            </div>
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
