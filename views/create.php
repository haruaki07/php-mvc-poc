<?php $title = "Add New Post"; ?>

<?php ob_start() ?>
<a href="/">Back</a><br>

<h1>Add new post</h1>
<form action="/" method="post">
  <label>
    Title
    <input type="text" name="title" placeholder="Type..." style="display: block;">
  </label>

  <br>
  <label>
    Content
    <textarea name="content" rows="10" style="display: block;" placeholder="Type..."></textarea>
  </label>

  <br>
  <button type="submit">Submit</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php include "_layout.php"; ?>
