<?php $title = $post->title ?>

<?php ob_start() ?>
<a href="/">Back</a>
<br>
<h1><?= $post->title ?></h1>

<div>
  <?= $post->content ?>
</div>
<?php $content = ob_get_clean() ?>

<?php include '_layout.php' ?>