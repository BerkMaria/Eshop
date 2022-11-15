<div class="page_list" align="center">
    <a href="#"><button class="page_button">1</button></a>
</div>
<?php foreach ($articles as $article): ?>
<h2><a href="/article/<?= $article-getId() ?>"><?= $article->getName() ?></a></h2>
<p><?= $article->getText() ?></p>
<hr>
<?php endforeach; ?>

<div style="text-align: center">
    <?php for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++): ?>
    <a href="/<?= $pageNum === 1 ? '' : $pageNum ?>"><?= $pageNum ?></a>
    <?php endfor;?>
</div>
