<?php $title = "My Personal Blog" ?>

<?php ob_start() ?>

<a href="/create">Buat Artikel</a>

<p>Daftar Artikel</p>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article): ?>
      <tr>
        <td><?= $article->id ?></td>
        <td><?= $article->title ?></td>
        <td>
          <a href="/<?= $article->id ?>">Detail</a>
          <a href="/edit/<?= $article->id ?>">Edit</a>
          <a href="/delete/<?= $article->id ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>