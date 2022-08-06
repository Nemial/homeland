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
$currentPath = $this->request->getPath();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title', '') ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['main']) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['main']) ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header class="container">
    <div class="d-flex bg-dark flex-wrap justify-content-center mb-4 py-3 px-4 border-bottom">
        <a class="align-self-center mb-3 mb-md-0 text-white text-decoration-none navbar-brand"
           href="<?= $this->Url->buildFromPath('Pages::main') ?>">
            <?= __('Главная') ?>
        </a>
        <h1 class="text-white mx-auto">
            Blog by <span class="text-primary">Nemial</span>
        </h1>
        <nav class="navbar navbar-expand-lg navbar-dark py-0">
            <ul class="navbar-nav">
                <?php
                if (!$this->Identity->isLoggedIn()): ?>
                    <?php
                    $loginPath = $this->Url->buildFromPath('Users::login');
                    $isLoginPage = $loginPath === $currentPath; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $isLoginPage ? 'active' : '' ?>"
                            <?= $isLoginPage ? 'aria-current="page"' : '' ?> href='<?= $loginPath ?>'>
                            <?= __('Войти') ?>
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
