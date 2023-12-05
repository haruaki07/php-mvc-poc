<?php $title = "Tambah Artikel" ?>

<?php ob_start() ?>

<form action="/create" method="POST" >
  <div>
    <label for="title">Judul</label>
    <input type="text" name="title" id="title">
  </div>
  <div>
    <label for="content">Konten</label>
    <textarea name="content" id="content"></textarea>
  </div>
  <button type="submit">Simpan</button>
</form>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>