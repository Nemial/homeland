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

$currentPath = $this->request->getPath();
$explodedLocaleData = explode('_', I18n::getLocale());
$currentLang = mb_strtolower($explodedLocaleData[0]);
$selectedNavItemClass = 'text-orange';
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
                        if ($this->Identity->get('is_admin') && $this->Identity->isLoggedIn()) : ?>
                            <?php
                            $listUsersPath = $this->Url->buildFromPath('Users::index');
                            ?>
                            <li>
                                <a class="dropdown-item <?= $currentPath === $listUsersPath ? $selectedNavItemClass : '' ?>"
                                   href="<?= $listUsersPath ?>">
                                    Список пользователей
                                </a>
                            </li>
                        <?php
                        endif; ?>
                        <?php
                        $aboutPath = $this->Url->buildFromPath('Pages::about');
                        ?>
                        <li>
                            <a class="dropdown-item <?= $currentPath === $aboutPath ? $selectedNavItemClass : '' ?>"
                               href="<?= $aboutPath ?>">
                                О сайте
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->buildFromPath('Pages::main') ?>"
                       class="navbar-brand m-0 fs-3">
                        Blog by
                        <span class="text-primary">Nemial</span>
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
<footer class="fixed-bottom">
    <div class="container-sm bg-dark py-3 rounded-top d-flex justify-content-between">
        <p class="text-white m-0">
            Powered by
            <a target="_blank" class="ms-1 link-info" href="https://getbootstrap.com/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     class="bi bi-bootstrap" viewBox="0 0 16 16">
                    <path
                        d="M5.062 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377H6.375z"/>
                    <path
                        d="M0 4a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4zm4-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3H4z"/>
                </svg>
            </a>
        </p>
        <p class="text-white m-0 opacity-25">
            Copyright &copy; <?= date('Y') ?> by Nemial
        </p>
    </div>
</footer>
</body>
</html>
