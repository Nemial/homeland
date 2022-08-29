<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */

$this->Html->css(['editor'], ['block' => true]);
$this->Html->script(['editor'], ['block' => true]);
$this->assign('title', 'Добавить статью');
?>
<aside class="column">
    <?= $this->Html->link(__('Список статей'), ['action' => 'index'], ['class' => 'link-dark me-2',]
    ) ?>
</aside>
<div class="container-sm w-50">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <h1 class="text-center"><?= __('Добавить статью') ?></h1>
        <div class="mb-3">
            <label for="title" class="form-label"><?= __('Название') ?></label>
            <?= $this->Form->text(
                'title',
                ['id' => 'title', 'class' => 'form-control', 'required' => true]
            ) ?>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label"><?= __('Содержание') ?></label>
            <?= $this->Form->textarea(
                'body',
                ['id' => 'body', 'class' => 'form-control', 'required' => true]
            ) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Создать'), ['class' => 'btn btn-dark w-100']) ?>
    <?= $this->Form->end() ?>
</div>
