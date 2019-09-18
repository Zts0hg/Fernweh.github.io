<?php
  $error = NULL;
  include "includes/config.php";
  include "includes/db.php";

  if (isset($_GET['vkey'])){
      //  Process Verification
      $vkey = $_GET['vkey'];
      $query1 = "SELECT verified, vkey FROM user where verified=0 AND vkey='$vkey' LIMIT 1";
      $resultSet = $db->query($query1);

      if ($resultSet->num_rows == 1){
        //  Validate The Email
        $query2 = "UPDATE USER SET verified = 1 WHERE vkey='$vkey' LIMIT 1";
        $update = $db->query($query2);

        if($update){
          // echo "Your account has been verified. You can now login.";
        }
        else {
          $error = $db->error;
        }
      }
      else {
        $error = "This account invalid or already verified.";
      }
  }
  else {
    die("Something goes wrong.");
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Fernweh-Blog</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

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
    <link href="css/login.css" rel="stylesheet">
    <link rel="icon" href="images/fernwehicon.png" title="Fernweh" type="image/x-icon" >
    <?php include "includes/icon.php"?>

  </head>
  <body class="text-center">
    <?php include "includes/nav.php"?>
    <form method="post" action="sign-up.php" class="form-signin" style="margin-top: 100px">
      <img class="mb-4" src="../images/fernwehicon.png" alt="LOGO" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Thank you for registering</h1>
      <hr>
      <?php if ($error){ ?>
        <div class="alert alert-danger">
          <?php echo $error; ?>
          <p>Try to <a href="login.php">login</a>. </p>
        </div>
        <style >
          #tip {display: none;}
        </style>
      <?php } ?>
      <p id="tip" class="alert alert-success "> Your account has been verified successfully.<br> You can now <a href="login.php">login</a>.
      </p>
      <hr>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
