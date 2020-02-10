<?php 
    $errors = isset($errors) ? $errors : array();
    $msg = isset($msg) ? $msg : "";
    $gardenia=isset($gardenia)?$gardenia:"";
    // $getpatient=isset($getpatient)?$getpatient:array();
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        $name=$_SESSION['user']['name'];
        
    }
 ?>
<DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gardenia</title>
  <link rel="icon"  href="https://estavela.in.rs/images/heart.png" type="image/png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- <script src="../canvasjs/canvasjs.min.js"></script> -->  
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body style="background:#FAFBFC;">
<?php if (!empty($_SESSION['user']) && !empty($user['active'] == 1)) {  ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="https://estavela.in.rs/images/heart.png" width=30 alt="gardenia" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
             <a class="nav-item nav-link " href="routes.php?page=showhome">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if (empty($_SESSION['user'])) { ?>
          <li class="nav-item active">
             <a class=" nav-link" href="routes.php?page=showlogin">Login</a>
          </li>
          <li class="nav-item active">
             <a class=" nav-link" href="routes.php?page=showregister">Register</a>
          </li>
          <?php } ?>
          <li class="nav-item">
             <a class=" nav-link" href="routes.php?page=showhome">Clear</a>
          </li>
          <li class="nav-item active">
             <a class=" nav-link" href="routes.php?page=showall">Results</a>
          </li>
          <li class="nav-item active">
             <a class=" nav-link" href="routes.php?page=showallstudy">All Score Patients</a>
          </li>
        </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control form-control-sm mr-sm-2" type="search" name="searchresult" placeholder="Search Result" aria-label="Search">
      <!--<button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit" name="page" value="Search">Search</button>-->
    &nbsp;&nbsp;
      <input class="form-control form-control-sm mr-sm-2" type="search" name="searchscore" placeholder="Search All Score Patients" aria-label="Search">
      <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit" name="page" value="Search">Search</button>
    </form>&nbsp;&nbsp;
    <form class="form-inline my-2 my-lg-0">
        <span class="text-white"><?php
          if (!empty($_SESSION['user'])) {
            echo "Hello  :  " . $_SESSION['user']['name'];
           ?>&nbsp;&nbsp;</span>
          <input class="btn btn-outline-warning btn-sm my-2 my-sm-0" type="submit" name="page" value="Logout">
        <?php } ?>
    </form>
    
 </div>
</nav>
<div class="container-fluid p-3 mb-5">
    <?php //var_dump($getsearch);die();
    if(!empty($getsearch)){ ?>
    <div class="col-md-2 offset-md-8">
        <div class="table-responsive">
        <table class="table table-light table-borderless">
        <tbody> 
             <?php foreach($getsearch as $v){  ?>
              <tr> 
                  <td><a class="text-dark" href="routes.php?page=showpatient&name=<?php echo$v['name']; ?>"><?php echo$v['name']; ?></a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    <?php //var_dump($getsearch);die();
    if(!empty($getsearchscore)){ ?>
    <div class="col-md-2 offset-md-8">
        <div class="table-responsive">
        <table class="table table-light table-borderless">
        <tbody> 
             <?php foreach($getsearchscore as $s){  ?>
              <tr> 
                  <td><a class="text-dark" href="routes.php?page=showscorepatient&name=<?php echo$s['name']; ?>"><?php echo$s['name']; ?></a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    <div class="col-sm-4 offset-sm-8">
    <?php
         if (!empty($msg)) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $msg;  ?>
            </div>
        <?php  } ?>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-sm-4">
            <?php if(isset($_SESSION['getpatient'])){ 
                    $getpatient=$_SESSION['getpatient']; ?>
                    <?php foreach($getpatient as $p){ ?>
                    <h5 class="text-dark"><?php echo $p['name']; ?></h5>
                    <?php } ?>
            <?php  } ?>
            </div>
            <div class="col-sm-6">
            <?php  if (!empty($gardenia)) { ?>
                    <h5 class="text-dark">Gardenia score is <?php echo $gardenia;  ?></h5>
            <?php  } ?>
            </div>
            <div class="col-sm-4">
            <a class="btn btn-danger btn-sm" href="routes.php?page=showhome">Clear</a>
            <a class="btn btn-info btn-sm" href="routes.php?page=showall">Results</a>
            </div>   
        </div>
        
    </div>
    <!--getpatient-->
    <?php
    if(!empty($getpatient)){ ?>
    <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>renal</th>
                <th>respiratory</th>
                <th>diabetes</th>
                <th>echo</th>
                <th>ecg</th>
                <th>new sympt.</th>
                <th>ischaemia</th>
                <th>afib</th>
                <th>Score</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody> 
             <?php foreach($getpatient as $value){  ?>
              <tr>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['renal']; ?></td>
                  <td><?php echo $value['respiratory']; ?></td>
                  <td><?php echo $value['diabetes']; ?></td>
                  <td><?php echo $value['echo']; ?></td>
                  <td><?php echo $value['ecg']; ?></td>
                  <td><?php echo $value['new_symptoms']; ?></td>
                  <td><?php echo $value['ischaemia']; ?></td>
                  <td><?php echo $value['afib']; ?></td>
                  <td><?php echo $value['result']; ?></td>
                  <td><a href="routes.php?page=edit&name=<?php echo $value['name']; ?>">&#10004;</a></td>
                  <td><a href="routes.php?page=delete&name=<?php echo $value['name']; ?>">&cross;</a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    <!--get score patients-->
    <?php
    if(!empty($getscorepatient)){ ?>
    <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>renal</th>
                <th>respiratory</th>
                <th>diabetes</th>
                <th>echo</th>
                <th>ecg</th>
                <th>new sympt.</th>
                <th>ischaemia</th>
                <th>afib</th>
                <th>Score</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody> 
             <?php foreach($getscorepatient as $value){  ?>
              <tr>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['renal']; ?></td>
                  <td><?php echo $value['respiratory']; ?></td>
                  <td><?php echo $value['diabetes']; ?></td>
                  <td><?php echo $value['echo']; ?></td>
                  <td><?php echo $value['ecg']; ?></td>
                  <td><?php echo $value['new_symptoms']; ?></td>
                  <td><?php echo $value['ischaemia']; ?></td>
                  <td><?php echo $value['afib']; ?></td>
                  <td><?php echo $value['result']; ?></td>
                  <td><a href="routes.php?page=delete&name=<?php echo $value['name']; ?>">&cross;</a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    <!--get all patients-->
    <?php
    
    if(!empty($allstudy)){ ?>
    <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>renal</th>
                <th>respiratory</th>
                <th>diabetes</th>
                <th>echo</th>
                <th>ecg</th>
                <th>new sympt.</th>
                <th>ischaemia</th>
                <th>afib</th>
                <th>Score</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody> 
             <?php foreach($allstudy as $value){  ?>
              <tr>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['renal']; ?></td>
                  <td><?php echo $value['respiratory']; ?></td>
                  <td><?php echo $value['diabetes']; ?></td>
                  <td><?php echo $value['echo']; ?></td>
                  <td><?php echo $value['ecg']; ?></td>
                  <td><?php echo $value['new_symptoms']; ?></td>
                  <td><?php echo $value['ischaemia']; ?></td>
                  <td><?php echo $value['afib']; ?></td>
                  <td><?php echo $value['result']; ?></td>
                  <td><?php echo $value['time_stamp']; ?></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    <!--get results-->
    <?php  $getallresults=isset($getallresults)?$getallresults:array();
     if(!empty($getallresults)){ ?>
    <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>renal</th>
                <th>respiratory</th>
                <th>diabetes</th>
                <th>echo</th>
                <th>ecg</th>
                <th>new sympt.</th>
                <th>ischaemia</th>
                <th>afib</th>
                <th>Score</th>
                <th>Time</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody> 
             <?php foreach($getallresults as $value){  ?>
              <tr>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['renal']; ?></td>
                  <td><?php echo $value['respiratory']; ?></td>
                  <td><?php echo $value['diabetes']; ?></td>
                  <td><?php echo $value['echo']; ?></td>
                  <td><?php echo $value['ecg']; ?></td>
                  <td><?php echo $value['new_symptoms']; ?></td>
                  <td><?php echo $value['ischaemia']; ?></td>
                  <td><?php echo $value['afib']; ?></td>
                  <td><?php echo $value['result']; ?></td>
                  <td><?php echo $value['time_stamp']; ?></td>
                  <td><a href="routes.php?page=edit&name=<?php echo $value['name']; ?>">&#10004;</a></td>
                  <td><a class="text-danger"  href="routes.php?page=delete&name=<?php echo $value['name']; ?>"><h6 class="font-weight-bold">&#10008;</h6></a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
            
           <!--<?php if(!empty($_SESSION['getallresults']) || !empty($_SESSION['allstudy']) || !empty($_SESSION['getpatient']) || !empty($getpatient)){ ?>-->
           <!-- <div class="col-sm-4 offset-md-3">-->
           <!-- <a class="btn btn-danger btn-sm" href="routes.php?page=showhome">Clear</a>-->
           <!-- <a class="btn btn-info btn-sm" href="routes.php?page=showall">Results</a>-->
           <!-- </div>-->
           <!-- <?php } ?>-->
    <!--form gardenia-->
    
    <hr class="col-md-6 offset-md-3 invisible">
    <div class="col-md-6 offset-md-3 "style="background:#F9F6F3;">
      <form  action="routes.php"method="post">
      <hr class="invisible">
      <input class="form-control" type="text" name="name" id="name" placeholder="Name">
      <span class="alert-danger">
            <?php if (array_key_exists('name', $errors)) {
                    echo $errors['name'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">Gender</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="gender" id="male" value="option1" aria-label="...">
      <label class="form-check-label" for="inlineRadio1">Male</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="gender" id="female" value="option2" aria-label="...">
      <label class="form-check-label" for="inlineRadio1">Female</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('gender', $errors)) {
                    echo $errors['gender'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">Age</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="age" id="age" value="age1">
      <label class="form-check-label" for="inlineRadio1">age > 70</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="age" id="age" value="age0">
      <label class="form-check-label" for="inlineRadio1">age < 70</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('age', $errors)) {
                    echo $errors['age'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">Renal</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="renal" id="renal" value="renal1" aria-label="...">
      <label class="form-check-label" for="inlineRadio1">renal yes</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="renal" id="renal" value="renal0" aria-label="...">
      <label class="form-check-label" for="inlineRadio1">renal no</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('renal', $errors)) {
                    echo $errors['renal'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">Respiratory</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="respiratory" id="respiratory" value="respiratory1">
      <label class="form-check-label" for="inlineRadio1">yes</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="respiratory" id="respiratory" value="respiratory0">
      <label class="form-check-label" for="inlineRadio1">no</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('respiratory', $errors)) {
                    echo $errors['respiratory'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">Diabetes</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="diabetes" id="diabetes" value="diabetes0">
      <label class="form-check-label" for="inlineRadio1">NO</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="diabetes" id="diabetes" value="diabetes1">
      <label class="form-check-label" for="inlineRadio1"> OAD</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="diabetes" id="diabetes" value="diabetes2">
      <label class="form-check-label" for="inlineRadio1">ID</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('diabetes', $errors)) {
                    echo $errors['diabetes'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">ECHO</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="echo" id="echo" value="echo0">
      <label class="form-check-label" for="inlineRadio1">normal</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="echo" id="echo" value="echo2">
      <label class="form-check-label" for="inlineRadio1">abnormal</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('echo', $errors)) {
                    echo $errors['echo'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">ECG</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="ecg" id="ecg" value="ecg0">
      <label class="form-check-label" for="inlineRadio1">normal </label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="ecg" id="ecg" value="ecg1">
      <label class="form-check-label" for="inlineRadio1">abnormal </label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('ecg', $errors)) {
                    echo $errors['ecg'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">N.Symp</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="ns" id="ns" value="ns0">
      <label class="form-check-label" for="inlineRadio1">normal </label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="ns" id="ns" value="ns1">
      <label class="form-check-label" for="inlineRadio1"> > 6 months </label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="ns" id="ns" value="ns2">
      <label class="form-check-label" for="inlineRadio1"> < 6 months </label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('ns', $errors)) {
                    echo $errors['ns'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">ISCHAEMIA</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="isch" id="isch" value="isch1">
      <label class="form-check-label" for="inlineRadio1">proven</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="isch" id="isch" value="isch_1">
      <label class="form-check-label" for="inlineRadio1">not proven</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('isch', $errors)) {
                    echo $errors['isch'];
                } ?>
      </span>
      <hr>
      <div class="custom-control custom-radio custom-control-inline">
      <h6 class="form-check-label" for="inlineRadio1">AFIB</h6>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="afib" id="afib" value="afib_1">
      <label class="form-check-label" for="inlineRadio1">afib +</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <input class="form-check-input position-static" type="radio" name="afib" id="afib" value="afib1">
      <label class="form-check-label" for="inlineRadio1">afib -</label>
      </div>
      <span class="alert-danger">
            <?php if (array_key_exists('afib', $errors)) {
                    echo $errors['afib'];
                } ?>
      </span>
      <hr>
      
      <input class="btn btn-success float-right"  type="submit" name=page value="result gardenia">
      
      </form>
      <br>
      <hr>        
    </div>
    <div class="col-md-3 offset-md-3">
    <?php
         if (!empty($msg)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $msg;  ?>
            </div>
        <?php  } ?>
    </div>
    <!--get patient-->
    <?php
    if(!empty($getpatient)){ ?>
    <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>renal</th>
                <th>respiratory</th>
                <th>diabetes</th>
                <th>echo</th>
                <th>ecg</th>
                <th>new sympt.</th>
                <th>ischaemia</th>
                <th>afib</th>
                <th>Score</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody> 
             <?php foreach($getpatient as $value){  ?>
              <tr>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender']; ?></td>
                  <td><?php echo $value['age']; ?></td>
                  <td><?php echo $value['renal']; ?></td>
                  <td><?php echo $value['respiratory']; ?></td>
                  <td><?php echo $value['diabetes']; ?></td>
                  <td><?php echo $value['echo']; ?></td>
                  <td><?php echo $value['ecg']; ?></td>
                  <td><?php echo $value['new_symptoms']; ?></td>
                  <td><?php echo $value['ischaemia']; ?></td>
                  <td><?php echo $value['afib']; ?></td>
                  <td><?php echo $value['result']; ?></td>
                  <td><a href="routes.php?page=delete&name=<?php echo $value['name']; ?>">&cross;</a></td>
              </tr>
            <?php }  ?>
        </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
    
    <!--end table -->
    
    <div class="col-md-3 offset-md-3">
            <a class="btn btn-danger btn-sm" href="routes.php?page=showhome">Clear</a>
    </div>
    <div class="col-md-4 offset-md-3">
    <?php
         if (!empty($gardenia)) { ?>
            <div class="alert alert-success" role="alert">
                <h4 class="text-dark">Gardenia score is <?php echo $gardenia;  ?></h4>
            </div>
        <?php  } ?>
    </div>
    <!--chart.js-->
    <?php
    if(!empty($allstudy)){ 
     $name=[];
     $result=[];
     foreach($allstudy as $value){
         array_push($result,$value['result']);
         array_push($name,$value['name']);
     }
    //  var_dump($result);die();
     ?>
    <div class="col-md-10 offset-md-1">
    <canvas id="myChartline" width="600" height="600"></canvas>
    <script>
                      var dataName=JSON.parse('<?php echo json_encode($name); ?>')
                      var dataResult = JSON.parse('<?php echo json_encode($result);?>');
                        var ctx = document.getElementById("myChartline").getContext('2d');
    var myChartline = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dataName,
            datasets: [{ 
                label: 'Gardenia score', // Name the series
                
                data: dataResult,  
                fill: false,
                borderColor: '#2196f3', // Add custom color border (Line)
                backgroundColor:'#2196f3', // Add custom color background (Points and Fill)
                borderWidth: 3 // Specify bar border width
            }]},
        options: {
          responsive: true, // Instruct chart js to respond nicely.
          maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
        }
    });
    </script>          
    </div>
    <?php } ?>
    <!--chart js-->
    <?php
    if(!empty($allstudy)){ 
     $name=[];
     $result=[];
     foreach($allstudy as $value){
         array_push($result,$value['result']);
         array_push($name,$value['name']);
     }
    //  var_dump($result);die();
     ?>
    <div class="col-md-10 offset-md-1">
    <canvas id="myChart" width="600" height="600"></canvas>
    <script>
                      var dataName=JSON.parse('<?php echo json_encode($name); ?>')
                      var dataResult = JSON.parse('<?php echo json_encode($result);?>');
                        var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataName,
            datasets: [{ 
                label: 'Gardenia score', // Name the series
                
                data: dataResult,  
                fill: false,
                borderColor:  [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ], // Add custom color border (Line)
                backgroundColor:[
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 99, 132, 1)'
            ], // Add custom color background (Points and Fill)
                borderWidth: 3 // Specify bar border width
            }]},
        options: {
          offset: true,
          drawOnChartArea: true,
          responsive: true, // Instruct chart js to respond nicely.
          maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
        }
    });
    </script>          
    </div>
    <?php } ?>
    <?php
    if(!empty($allstudy)){ 
     $name=[];
     $result=[];
     foreach($allstudy as $value){
         array_push($result,$value['result']);
         array_push($name,$value['name']);
     }
    //  var_dump($result);die();
     ?>
    <div class="col-md-10 offset-md-1">
    <canvas id="myChartRadar" width="600" height="600"></canvas>
    <script>
                      var dataName=JSON.parse('<?php echo json_encode($name); ?>')
                      var dataResult = JSON.parse('<?php echo json_encode($result);?>');
                        var ctx = document.getElementById("myChartRadar").getContext('2d');
    var myChartRadar = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: dataName,
            datasets: [{ 
                label: 'Gardenia score', // Name the series
                data: dataResult,  
                fill: true,
                borderColor:'rgba(54, 162, 235, 1)', // Add custom color border (Line)
                backgroundColor:'rgba(255, 99, 132, 0.3)', // Add custom color background (Points and Fill)
                borderWidth: 3 // Specify bar border width
            }]},
        options: {
          responsive: true, // Instruct chart js to respond nicely.
          maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
        }
    });
    </script>          
    </div>
    <?php } ?>
    <!--end chart js-->
</div> <!-- end container fluid -->
<?php }else{
    include 'login.php';
} ?>
</body>
</html>