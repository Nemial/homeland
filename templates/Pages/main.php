<?php
/**
 * * @var AppView $this
 *
 * @var \App\View\AppView $this
 * @var string $articlesCount
 */

use App\View\AppView;

$this->assign('title', 'Блог от Nemial');
?>
<div class="d-flex text-white h-100 flex-column align-items-center justify-content-between">
    <div class="bg-dark text-center border border-4 border-opacity-50 rounded-2 p-3 border-white">
        <h1 class="fst-italic fw-normal">
            Привет, <span class="text-info fst-normal">Интернет</span>
        </h1>
        <p class="fs-4 mt-5">
            Наверное, ты ожидал увидеть здесь <b class="text-blue-light">Главную</b>
        </p>
        <p class="fs-4">
            Но автор этого сайта понятия не имеет, как должна выглядеть
            <span class="text-decoration-underline">крутая</span> главная, поэтому
            здесь этот текст 😅
        </p>
        <p class="fst-italic fs-4">
            Этот
            <span class="text-teal-light">Блог</span> мог быть сделан на чём-то популярном
            (<span class="text-red-bitrix">Bitrix</span>), либо на чём-то технологичном
            (<span class="text-orange">Laravel</span>)
        </p>
        <p class="fs-4 mt-3">
            Но в итоге, он просто сделан с
            <span class="text-danger fst-italic">
            любовью
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                 class="bi bi-suit-heart-fill" viewBox="0 0 16 16"><path
                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/></svg>
        </span>
        </p>
    </div>
</div>
