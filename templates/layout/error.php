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
?>
<!DOCTYPE html>
<html lang="<?= h($currentLang) ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['main']) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['libraries', 'main']) ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="container">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->Html->link(__('Назад'), 'javascript:history.back()') ?>
</div>
</body>
</html>
