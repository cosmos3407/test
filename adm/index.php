<?php
include_once('../common.php');
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Signin Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="<?= CSS_URL ?>/bootstrap.min.css" rel="stylesheet">
  <link href="<?= CSS_URL ?>/bootstrap.css" rel="stylesheet">
  <link href="<?= CSS_URL ?>/sign-in.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="<?= JS_URL ?>/bootstrap.js"></script>
  <script src="<?= JS_URL ?>/bootstrap.min.js"></script>
  <script src="<?= JS_URL ?>/color-modes.js"></script>

  
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <main class="form-signin w-100 m-auto">
    <form method="post" action="controller.php">
      <h1 class="h3 mb-3 fw-normal">어드민 페이지</h1>

      <div class="form-floating">
        <label for="floatingInput">ID</label>
        <input type="" class="form-control" id="floatingInput" placeholder="id">

      </div>
      <div class="form-floating">
        <label for="floatingPassword">Password</label>
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
  </main>

</body>

</html>