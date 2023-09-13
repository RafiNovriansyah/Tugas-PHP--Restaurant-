
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <style>
        .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
  margin-top: 100px;
}
    </style>
  </head>

  <body class="text-center">
   <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-4 ">
        <form class="form-signin" action="Proses_Sign_Up.php" method="POST">
      <img class="mb-4" src="" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Sign Up to access more content !</h1>
      <input type="email" name="Username" class="sr-only"></input>
      <input type="email" name="Username" class="form-control" placeholder="Email address" required autofocus>
      <input type="password" name="Password" class="sr-only"></input>
      <input type="password" name="Password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up" ></input> <br>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
        </div>
    </div>
   </div>

    <script src="bootstrap.min.js"></script>
	<script src="jquery-3.2.1.js"></script>
  </body>
</html>
