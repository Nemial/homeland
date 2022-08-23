<?php

/**
 * @var \App\View\AppView $this
 */

$this->assign('title', __('Вход'))
?>
<div class="container-sm w-50">
    <?= $this->Form->create() ?>
    <h1 class="text-center"><?= __('Вход') ?></h1>
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
        <div class="mb-3 form-check">
            <label for="remember_me" class="form-check-label"><?= __('Запомнить меня?') ?></label>
            <?= $this->Form->checkbox(
                'remember_me',
                ['id' => 'remember_me', 'class' => 'form-check-input']
            ) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Войти'), ['class' => 'btn btn-dark w-100 mb-3']); ?>
    <p>
        Если нет аккаунта, то поможет
        <a class="link-primary" href="<?= $this->Url->buildFromPath('Users::add') ?>">
            <?= __('Регистрация') ?>
        </a>
    </p>
    <?= $this->Form->end() ?>
</div>
