<?php

/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('Вход'))
?>
<div class="container-sm w-50">
    <?= $this->Form->create() ?>
    <h3><?= __('Введите свой email и пароль') ?></h3>
    <fieldset>
        <div class="mb-3">
            <label for="email" class="form-label"><?= __('Email') ?></label>
            <?= $this->Form->email('email', ['class' => 'form-control', 'required']
            ) ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= __('Пароль') ?></label>
            <?= $this->Form->password('password', ['class' => 'form-control', 'required']) ?>
        </div>
    </fieldset>

    <?= $this->Form->button(__('Вход'), ['class' => 'btn btn-dark w-100']); ?>
    <?= $this->Form->end() ?>
</div>
