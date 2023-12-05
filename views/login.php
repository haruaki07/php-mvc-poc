<?php $title = "Login" ?>

<?php ob_start() ?>

<h1>Login</h1>

<?php if (isset($error)): ?>
  <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="/login" method="post">
  <label for="">Username</label>
  <input type="text" name="username">

  <label for="">Password</label>
  <input type="password" name="password">

  <button type="submit">Masuk</button>
</form>

<?php $content = ob_get_clean() ?>

<?php include "_layout.php" ?>