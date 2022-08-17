<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var mixed $groups
 * @var mixed $is_admin
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Действия') ?></h4>
            <?= $this->Html->link(
                __('Список'),
                ['action' => 'index'],
                ['class' => 'link-dark me-2']
            ) ?>
            <?= $this->Form->postLink(
                __('Удалить'),
                ['action' => 'delete', $user->id],
                [
                    'confirm' => __('Вы уверены что хотите удалить # {0}?', $user->id),
                    'class' => 'link-danger',
                ]
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
            <?php
            if ($this->Identity->get('is_admin')): ?>
                <div class="mb-3">
                    <label for="groups" class="form-label"><?= __('Группы') ?></label>
                    <?= $this->Form->select(
                        'groups._ids',
                        $groups,
                        ['class' => 'form-select', 'multiple' => true]
                    ) ?>
                </div>
            <?php
            endif; ?>
        </fieldset>
        <?= $this->Form->button(__('Отправить'), ['class' => 'btn btn-dark w-100']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
