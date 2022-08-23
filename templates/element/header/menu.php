<?php
$currentPath = $this->request->getPath();
$selectedNavItemClass = 'text-orange';
?>
<nav class="navbar navbar-expand-sm navbar-dark">
    <ul class="navbar-nav container-fluid justify-content-between">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-center" href="#" role="button"
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
                $articlesPath = $this->Url->buildFromPath('Articles::index');
                ?>
                <li>
                    <a class="dropdown-item <?= $currentPath === $articlesPath ? $selectedNavItemClass : '' ?>"
                       href="<?= $articlesPath ?>">
                        <?= __('Список статей') ?>
                    </a>
                </li>
                <?php
                $aboutPath = $this->Url->buildFromPath('Pages::about');
                ?>
                <li>
                    <a class="dropdown-item <?= $currentPath === $aboutPath ? $selectedNavItemClass : '' ?>"
                       href="<?= $aboutPath ?>">
                        <?= __('О сайте') ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= $this->Url->buildFromPath('Pages::main') ?>"
               class="navbar-brand m-0 fs-1">
                Блог от
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
