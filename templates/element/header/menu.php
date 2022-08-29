<?php

/**
 * @var \App\View\AppView $this
 */
$currentPath = $this->request->getPath();
$selectedNavItemClass = 'text-orange';
?>
<nav class="navbar navbar-expand-sm navbar-dark justify-content-between">
    <ul class="navbar-nav container-fluid">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-center" href="#" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                Меню
            </a>
            <ul class="dropdown-menu">
                <?php
                $articlesPath = $this->Url->build(['_name' => 'blog']);
                ?>
                <li>
                    <a class="dropdown-item <?= $currentPath === $articlesPath ? $selectedNavItemClass : '' ?>"
                       href="<?= $articlesPath ?>">
                        <?= __('Блог') ?>
                    </a>
                </li>
                <?php
                $aboutPath = $this->Url->build(['_name' => 'about']);
                ?>
                <li>
                    <a class="dropdown-item <?= $currentPath === $aboutPath ? $selectedNavItemClass : '' ?>"
                       href="<?= $aboutPath ?>">
                        <?= __('О сайте') ?>
                    </a>
                </li>
                <?php
                if ($this->Identity->get('is_admin')): ?>
                    <hr class="dropdown-divider">
                    <?php
                    $listUsersPath = $this->Url->buildFromPath('Admin/Users::index');
                    ?>
                    <li>
                        <a class="dropdown-item <?= $currentPath === $listUsersPath ? $selectedNavItemClass : '' ?>"
                           href="<?= $listUsersPath ?>">
                            Список пользователей
                        </a>
                    </li>
                    <?php
                    $articlesPath = $this->Url->buildFromPath('Admin/Articles::index');
                    ?>
                    <li>
                        <a class="dropdown-item <?= $currentPath === $articlesPath ? $selectedNavItemClass : '' ?>"
                           href="<?= $articlesPath ?>">
                            <?= __('Список статей') ?>
                        </a>
                    </li>
                <?php
                endif; ?>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= $this->Url->build(['_name' => 'home']) ?>"
               class="navbar-brand m-0 fs-1">
                Блог от
                <span class="text-primary">Nemial</span>
                <?php
                if ($this->Identity->get('is_admin')): ?>
                    -
                    <span class="text-orange">Плюс</span>
                <?php
                endif; ?>
            </a>
        </li>
        <?php
        if (!$this->Identity->isLoggedIn()) : ?>
            <?php
            $loginPath = $this->Url->build(['_name' => 'login']);
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
                   href='<?= $this->Url->build(['_name' => 'logout']) ?>'>
                    <?= __('Выйти') ?>
                </a>
            </li>
        <?php
        endif;
        ?>
    </ul>
</nav>
