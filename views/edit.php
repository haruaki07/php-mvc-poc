<?php $title = "Edit Artikel" ?>

<?php ob_start(); ?>
<a href="/">Kembali</a>
<form action="/edit/<?= $article['id'] ?>" method="POST">
  <div>
    <label for="title">Judul</label>
    <input 
      type="text" 
      name="title" 
      id="title" 
      value="<?= $article['title'] ?>">
  </div>
  <div>
    <label for="content">Konten</label>
    <textarea 
      name="content" 
      id="content"><?= $article['content'] ?></textarea>
  </div>
  <button type="submit">Simpan</button>
</form>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>