<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var mixed $groups
 */

$this->assign('title', __('Добавление пользователя'));
?>
<aside class="column">
    <p class="fs-5 fw-semibold mb-1"><?= __('Действия') ?></p>
    <?= $this->Html->link(
        __('Список'),
        ['action' => 'index'],
        ['class' => 'link-dark me-2']
    ) ?>
</aside>
<div class="container-sm w-50">
    <?= $this->Form->create($user) ?>
    <h1 class="text-center"><?= __('Добавление пользователя') ?></h1>
    <fieldset>
        <div class="mb-3">
            <label for="email" class="form-label"><?= __('Email') ?></label>
            <?= $this->Form->email(
                'email',
                ['id' => 'email', 'class' => 'form-control', 'required' => true]
            ) ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= __('Пароль') ?></label>
            <?= $this->Form->password(
                'password',
                ['id' => 'password', 'class' => 'form-control', 'required' => true]
            ) ?>
        </div>
        <div class="mb-3">
            <label for="groups" class="form-label"><?= __('Группы') ?></label>
            <?= $this->Form->select(
                'groups._ids',
                $groups,
                ['class' => 'form-select', 'multiple' => true]
            ) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Добавить'), ['class' => 'btn btn-dark w-100']); ?>
    <?= $this->Form->end() ?>
</div>
