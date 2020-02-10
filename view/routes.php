<?php 
require_once '../controllers/Controller.php';
$controller= new Controller();
$page=isset($_GET['page'])?$_GET['page']:"";
switch($page){
  case 'showlogin':
    $controller->showLogin();
  break;
  case 'showregister':
    $controller->showRegister();
  break;
  case 'showhome':
    $controller->showHome();
  break;
  case 'Logout':
    $controller->logout();
  break;
  case 'delete':
    $controller->delete();
  break;
  case 'showall':
    $controller->showAllResults();
  break;    
  case 'edit':
    $controller->editResult();
  break;
  case 'showallstudy':
    $controller->showAllStudy();
  break;
  case 'Search':
    $controller->getSearch();
  break;
  case 'showpatient':
    $controller->showPatient();
  break;
  case 'showscorepatient':
    $controller->showScorePatient();
  break;
  
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $page=isset($_POST['page'])?$_POST['page']:"";
  switch($page){

   case 'result gardenia':
     $controller->gardenia();
   break;
   case 'Register':
    $controller->registration();
   break;
   case 'Log in':
    $controller->login();
   break;

  }  
}
?>