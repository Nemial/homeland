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
 * @var AppView $this
 */

use App\View\AppView;
use Cake\I18n\I18n;

$currentPath = $this->request->getPath();
$explodedLocaleData = explode('_', I18n::getLocale());
$currentLang = mb_strtolower($explodedLocaleData[0]);
?>
<!DOCTYPE html>
<html lang="<?= $currentLang ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['main']) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['main']) ?>
    <?= $this->fetch('script') ?>
</head>
<body class="">
<header>
    <div class="container bg-dark py-3 rounded-bottom mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="navbar-nav container-fluid justify-content-between">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Меню
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($this->Identity->is(1)) : ?>
                            <li>
                                <a class="dropdown-item"
                                   href="<?= $this->Url->buildFromPath('Users::index') ?>">
                                    Список пользователей
                                </a>
                            </li>
                        <?php
                        endif; ?>
                        <li><a class="dropdown-item" href="#">О сайте</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->buildFromPath('Pages::main') ?>"
                       class="navbar-brand m-0 fs-3">
                        Blog by <span class="text-primary">Nemial</span>
                    </a>
                </li>
                <?php
                if (!$this->Identity->isLoggedIn()) : ?>
                    <?php
                    $loginPath = $this->Url->buildFromPath('Users::login');
                    $isLoginPage = $loginPath === $currentPath; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $isLoginPage ? 'active' : '' ?>"
                            <?= $isLoginPage ? 'aria-current="page"' : '' ?>
                           href='<?= $loginPath ?>'>
                            <?= __('Войти') ?>
                        </a>
                    </li>
                <?php
                else : ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href='<?= $this->Url->buildFromPath('Users::logout') ?>'>
                            <?= __('Выйти') ?>
                        </a>
                    </li>
                <?php
                endif;
                ?>
            </ul>
        </nav>
    </div>
</header>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
    <div class="container">

    </div>
</footer>
</body>
</html>
