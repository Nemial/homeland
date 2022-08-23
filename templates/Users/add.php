<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', __('Регистрация'));
?>
<div class="container-sm w-50">
    <?= $this->Form->create($user) ?>
    <h1 class="text-center"><?= __('Регистрация') ?></h1>
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
    </fieldset>
    <?= $this->Form->button(__('Зарегистрироваться'), ['class' => 'btn btn-dark w-100']); ?>
    <?= $this->Form->end() ?>
</div>
