<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
$this->assign('title', "Блог от Nemial | $article->title")
?>
<div class="">
    <div class="my-5 text-center">
        <h1><?= h($article->title) ?></h1>
        <div class="mt-4">
            <?= $article->body ?>
        </div>
    </div>
</div>
