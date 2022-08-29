<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\I18n\I18n;

$explodedLocaleData = explode('_', I18n::getLocale());
$currentLang = mb_strtolower($explodedLocaleData[0]);
$isAdminSection = $this->request->getParam('prefix') === 'Admin';

$this->Html->css(['main'], ['block' => true]);
$this->Html->script(['bootstrap5', 'main'], ['block' => true]);
?>
<!DOCTYPE html>
<html lang="<?= h($currentLang) ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= h($this->fetch('title')) ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="page <?= $isAdminSection ? '' : 'bg-dark' ?>">
<header class="page__header mb-4">
    <div
        class="container-sm rounded-bottom <?= $isAdminSection ? 'bg-dark' : 'border border-3 border-white border-opacity-25' ?>">
        <?= $this->element('header/menu') ?>
    </div>
</header>
<main class="page__main">
    <div class="container h-100">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer class="page__footer mt-4">
    <div
        class="container-sm py-2 d-flex justify-content-between rounded-top <?= $isAdminSection ? 'bg-dark' : 'border border-3 border-white border-opacity-25' ?>">
        <div>
            <?= $this->element('footer/info') ?>
        </div>
        <div class="text-center">
            <?= $this->element('footer/contacts') ?>
        </div>
    </div>
</footer>
</body>
</html>
