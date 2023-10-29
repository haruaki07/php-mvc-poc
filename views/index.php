<?php $title = "List of Posts"; ?>

<?php ob_start() ?>
<h1>List of Posts</h1>
<a href="/create">Create</a>
<ul>
  <?php foreach ($posts as $post) : ?>
    <li>
      <a href="/<?= $post->id ?>">
        <?= $post->title ?>
      </a>

      -

      <a href="/<?= $post->id ?>/delete" onclick="
        event.currentTarget.querySelector('form').submit()
        return false;
      ">
        Delete
        <form action="/<?= $post->id ?>/delete" method="post"></form>
      </a>
    </li>
  <?php endforeach ?>
</ul>
<?php $content = ob_get_clean(); ?>

<?php include "_layout.php"; ?>