<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Gardenia</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gardenia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="https://estavela.in.rs/images/heart.png" type="image/png"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background:linear-gradient(to top,#FFFFFF,white) no-repeat fixed center;">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="routes.php?page=showhome"><img src="https://estavela.in.rs/images/heart.png" width=30 alt="gardenia" /></a>
  <a class="navbar-brand" href="routes.php?page=showhome">Gardenia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=showhome">Home <span class="sr-only">(current)</span></a>
      </li>
         
    </ul>  
  </div>
</nav>
 <?php
    $errors = isset($errors) ? $errors : array();
    $msg = isset($msg) ? $msg : "";
    ?>
<div class="container-fluid">
<div class="container mt-5 p-5">
        <div class="container mt-5 col-md-6 text-center">
            <h4>Login</h4>
            <form action="routes.php" method="post">
                <input class="form-control" type="text" name="name" placeholder="name">
                <br>
                <input class="form-control" type="password" name="password" placeholder=" password">
                <br>
                <input class="btn btn-primary" type="submit" name="page" value="Log in">
            </form>
            <h6><a href="routes.php?page=forgot_password" >forgot password</a></h6>
            &nbsp;
            
            <!-- skracenica za razmak ili <br>-->
            <h5>Don't have an account</h5>
            <h5>Please - <a class="text-right" href="routes.php?page=showregister">REGISTER</a></h5>
            <?php
            if (!empty($msg)) {   //sve sto saljemo includom $msg ide ovako
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>

                </div>
            <?php
        } ?>
            <!--posto message sa index strane ide na ovu stranu saljemo preko header Location taj podatak ide get METODOM PA JE OVDE POTREBNO DA GA POKUPIM IZ GET-a -->
            <?php if (!empty($_GET['msg'])) {
                // $msg = $_GET['msg'];
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    // $msg = $_GET['msg'];
                    echo $_GET['msg'];
                    ?>
                </div>
            <?php
        } ?>
        </div>

    </div>
<?php if(isset($register)&&$register==1){ ?>
    <div class="container col-md-6 mb-5 p-5 text-center bg-dark text-white">
        <h4>Registration</h4>
        <form action="routes.php" method="post">
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            <span class="alert-danger">
                <?php if (array_key_exists('name', $errors)) {
                    echo $errors['name'];
                } ?>
            </span>
            <br>
            <input class="form-control" type="text" name="surname" placeholder="Enter surname">
            <span class="alert-danger">
                <?php if (array_key_exists('surname', $errors)) {
                    echo $errors['surname'];
                } ?>
            </span>
            
            <br>
            <input class="form-control" type="text" name="email" placeholder="Enter email">
            <span class="alert-danger">
                <?php if (array_key_exists('email', $errors)) {
                    echo $errors['email'];
                } ?>
            </span>
            
            <br>
            <input class="form-control" type="password" name="password" placeholder="Unesite password">
            <span class="alert-danger">
                <?php if (array_key_exists('password', $errors)) {
                    echo $errors['password'];
                } ?>
            </span>
            <br>
            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm  password">
            <span class="alert-danger">
                <?php if (array_key_exists('confirmpassword', $errors)) {
                    echo $errors['confirmpassword'];
                } ?>
            </span>
            <br>
            <input class="btn btn-warning" type="submit" name="page" value="Register">
        </form>
        <?php
    // echo "<span class=alert-warning>$msg</span>";
        if (!empty($msg)) {
            ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $msg;  ?>
        </div>
        <?php 
    } ?>
        <!--super fora zapamtiti-->
</div>
<?php } ?>
</div><!--end container-fluid-->
<footer class="fixed-bottom bg-dark">
        <div class="container text-center">
        <h6><a class="text-white" href="#">Copyright by Uros Tatomir 2019</a></h6>
        </div>
        
</footer> <!--end footer div-->
</body>
</html>