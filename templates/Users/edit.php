<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                    'class' => 'side-nav-item',
                ]
            ) ?>
            <?= $this->Html->link(
                __('List Users'),
                ['action' => 'index'],
                ['class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="container-sm w-50">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <h3 class="text-center"><?= __('Редактирование пользователя') ?></h3>
            <div class="mb-3">
                <label for="email" class="form-label"><?= __('Email') ?></label>
                <?= $this->Form->email(
                    'email',
                    ['id' => 'email', 'class' => 'form-control', 'required' => true]
                ) ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><?= __('Пароль') ?></label>
                <?= $this->Form->text(
                    'password',
                    ['id' => 'password', 'class' => 'form-control', 'required' => true]
                ) ?>
            </div>
        </fieldset>
        <?= $this->Form->button(__('Отправить'), ['class' => 'btn btn-dark w-100']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
