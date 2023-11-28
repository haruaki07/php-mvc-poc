<?php $title = $article["title"] ?>

<?php ob_start() ?>

<a href="/">Kembali</a>

<h1><?= $article["title"] ?></h1>
<p><?= $article["content"] ?></p>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>