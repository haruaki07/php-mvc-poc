<?php $title = "My Personal Blog" ?>

<?php ob_start() ?>
<p>Daftar Artikel</p>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Content</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article): ?>
      <tr>
        <td><?= $article->id ?></td>
        <td><?= $article->title ?></td>
        <td><?= $article->content ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>