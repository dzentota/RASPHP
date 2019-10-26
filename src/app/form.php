<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Signin RASPHP</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post">
  <img class="mb-4" src="img/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?=$_POST['email']?? '';?>" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="text" id="inputPassword" class="form-control" placeholder="Password" name="password" value="<?=$_POST['password']?? '';?>" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
    <?php

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $link = mysqli_connect('mysql', 'rasphp', 'rasphp', 'rasphp');
        /* check connection */
        if (mysqli_connect_errno()) {
            printf('Connect failed: %s\n', mysqli_connect_error());
            exit();
        }
        $sql = <<<SQL
SELECT * FROM users WHERE email= '{$_POST['email']}' AND password=md5('{$_POST['password']}')
SQL;
        /* Select queries return a resultset */
        if ($result = mysqli_query($link, $sql)) {
            if ($row = mysqli_fetch_assoc($result)) {
                echo '<h3 style="color:green">Logged in as ' . $row['email'] . '</h3>';
            } else {
                echo '<h3 style="color:red">Invalid login or password</h3>';
            }
            mysqli_free_result($result);
        }

        mysqli_close($link);
    }
    ?>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>
