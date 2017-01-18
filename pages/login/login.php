<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Medidata</title>

  <link rel="stylesheet" href="../../jquery_bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
  <script src="../../jquery_bootstrap/jquery-3.1.1.min.js"></script>
  <script src="login.js"></script>

  </script>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <img class="logo" src="../../img/logo.png" alt="">
      </div>
    </div>
    <div class="row">
      <div class="wrap-login col-md-4 col-md-offset-4">
        <form>
          <h2 class ="titre_login">Login in Medidata</h2>
          <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" id="" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="" placeholder="Password">
          </div>
          <span class="login_message"></span>
          <button type="submit" class="btn-login btn btn-default btn-lg btn-block">Submit</button>
        </form>

      </div>
    </div>
  </div>

</body>

</html>
