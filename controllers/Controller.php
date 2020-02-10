<?php  
require_once '../model/DAO.php';
class Controller{

public function gardenia(){
 $name=isset($_POST['name'])?$_POST['name']:"";
 $gender=isset($_POST['gender'])?$_POST['gender']:"";
 $age=isset($_POST['age'])?$_POST['age']:"";
 $renal=isset($_POST['renal'])?$_POST['renal']:"";
 $respiratory=isset($_POST['respiratory'])?$_POST['respiratory']:"";
 $diabetes=isset($_POST['diabetes'])?$_POST['diabetes']:"";
 $echo=isset($_POST['echo'])?$_POST['echo']:"";
 $ecg=isset($_POST['ecg'])?$_POST['ecg']:"";
 $ns=isset($_POST['ns'])?$_POST['ns']:"";
 $isch=isset($_POST['isch'])?$_POST['isch']:"";
 $afib=isset($_POST['afib'])?$_POST['afib']:"";
//  var_dump($gender,$age,$renal,$respiratory,$diabetes,$echo,$ecg,$ns,$isch,$afib);die();
$errors=array();
  if(!empty($name)){
     $dao=new DAO(); 
     $getpatient=$dao->getData($name);
     foreach($getpatient as $p){
         if($p['name']==$name){
            $errors['name']='This name already exists';
         }
     }
  }else{
      $errors['name']='Please enter Name';
  }
  if(!empty($gender)){
        if($gender=='option1'){
            $gend=1;
        }elseif($gender=='option2'){
            $gend=-1;
        }
  }else{
      $errors['gender']="Check gender";
      
  }
  if(!empty($age)){
    if($age=='age1'){
        $ag=0;
    }elseif($age=='age0'){
        $ag=1;
    }
   }else{
     $errors['age']="Check age";
   }
   if(!empty($renal)){
    if($renal=='renal1'){
        $ren=1;
    }elseif($renal=='renal0'){
        $ren=0;
    }
   }else{
     $errors['renal']="Check renal";
    
   }
   if(!empty($respiratory)){
    if($respiratory=='respiratory1'){
        $resp=-1;
    }elseif($respiratory=='respiratory0'){
        $resp=0;
    }
   }else{
     $errors['respiratory']="Check renal";
    
   }
   if(!empty($diabetes)){
    if($diabetes=='diabetes0'){
        $diab=0;
    }elseif($diabetes=='diabetes1'){
        $diab=1;
    }elseif($diabetes=='diabetes2'){
        $diab=2;
    }
   }else{
     $errors['diabetes']="Check diabetes";
    
   }
   if(!empty($echo)){
    if($echo=='echo0'){
        $ech=0;
    }elseif($echo=='echo2'){
        $ech=2;
    }
   }else{
     $errors['echo']="Check echo";
    
   }
   if(!empty($ecg)){
    if($ecg=='ecg0'){
        $ec=0;
    }elseif($ecg=='ecg1'){
        $ec=1;
    }
   }else{
     $errors['ecg']="Check ecg";
    
   }
   if(!empty($ns)){
    if($ns=='ns0'){
        $n=0;
    }elseif($ns=='ns1'){
        $n=1;
    }elseif($ns=='ns2'){
        $n=2;
    }
   }else{
     $errors['ns']="Check New symptoms";
    
   }
   if(!empty($isch)){
    if($isch=='isch1'){
        $isc=1;
    }elseif($isch=='isch_1'){
        $isc=-1;
    }
   }else{
     $errors['isch']="Check ischaemia";
    
   }
   if(!empty($afib)){
    if($afib=='afib_1'){
        $afi=0;
    }elseif($afib=='afib1'){
        $afi=-1;
    }
   }else{
     $errors['afib']="Check afib";
    
   }
 if(count($errors)==0){
    session_start();
    $dao=new DAO(); 
    $result=$gend+$ag+$ren+$resp+$diab+$ech+$ec+$n+$isc+$afi;
    $insert=$dao->insertData($name,$gend,$ag,$ren,$resp,$diab,$ech,$ec,$n,$isc,$afi,$result);
    $getpatient=$dao->getData($name);
    
        $_SESSION['getpatient']=$getpatient;
        $gardenia=$result;
        include 'index.php';
   
 }else{
     session_start();
    unset($_SESSION['getpatient']);
     $msg="Check form correctly";
     include 'index.php';
 }

}//end gardenia
public function showLogin(){
  include 'login.php';
}
public function showRegister(){
    $register=1;
    include 'login.php';
}
public function login(){
    $name=isset($_POST['name'])?$_POST['name']:"";
    $password=isset( $_POST['password'])?$_POST['password']:"";
   
   if(!empty($name) && !empty($password)){
       $dao= new DAO();
       $user=$dao->login($name,$password);
       if($user['active']==1){
       //uvek kada koristimo sesiju prvo treba da je startujemo
       session_start();
       $_SESSION['user']=$user;
       include 'index.php'; //ovo mora da se promeni kad se vrsi logovanje sa index strane da se vrati na index stranu
   
       }else{
           $msg= "Incorrect name or password";
           include 'login.php';
       }
   
   }else{
   $msg= "You must enter name and password";
   include 'login.php';
   }
   }
   public function registration(){
      $name=isset($_POST['name'])?$_POST['name']:"";
      $surname=isset($_POST['surname'])?$_POST['surname']:"";
      $email=isset($_POST['email'])?$_POST['email']:"";
      $password=isset($_POST['password'])?$_POST['password']:"";
      $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";
   
      $errors=array();
   
      if(empty($name)){
          $errors['name']= "You need to enter a name";
      }
      if(empty($surname)){
          $errors['surname']= "You need to enter a surname";
      }
      if(empty($email)){
          $errors['email']= "You need to enter a email";
   
      }else{
   
        if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
            $errors['email']= "You need to enter a valid email";
        }else{
            $dao=new DAO();
            $mail=$dao->getAllUsers();
            foreach($mail as $m){
                if($m['email']==$email){
                 $errors['email']= "This email already exists, please enter another email";
                }
            }
        }
      }
      if(empty($password)){
          $errors['password']="You need to enter password";
      }
      if(empty($confirmpassword)){
   
          $errors['confirmpassword']= "You need to confirm the password";
   
      }else{ 
          if ($password !== $confirmpassword){
   
                   $errors['confirmpassword'] = "Password fields do not match";
               }
           }
      if(count($errors)==0){
          $dao=new DAO();
          $active=0;
          $admin=0;
          $dao->register($name,$surname,$email,$password,$active,$admin);
          $msg= "You have successfully registered, please log in";
          include 'login.php';
      }else{
   
         $msg= "You need to enter the data correctly in the form ";
         $register=1;
         include 'login.php';
      }
   }
   public function showHome(){
       session_start();
       unset($_SESSION['getpatient']);
       unset($_SESSION['allstudy']);
       unset($_SESSION['getallresults']);
       include 'index.php';
   }
   public function logout(){
    session_start();
    unset($_SESSION['user']);
    header('Location:login.php');
}
public function delete(){
    $name=isset($_GET['name'])?$_GET['name']:"";
    $dao=new DAO();
    $delete_score=$dao->deleteScore($name);
    session_start();
    unset($_SESSION['getpatient']);
    include 'index.php';
}
public function showAllResults(){
    session_start();
    $dao=new DAO();
    $getallresults=$dao->getAll();
    $_SESSION['getallresults']=$getallresults;
    
    include 'index.php';
}
public function editResult(){
    $name=isset($_GET['name'])?$_GET['name']:"";
    
    $dao=new DAO();
    $getpatient=$dao->getData($name);
    // var_dump($getpatient);die();
    foreach($getpatient as $value){
        
        $gender= $value['gender'];
        $age=$value['age'];
        $renal=$value['renal'];
        $respiratory=$value['respiratory'];
        $diabetes=$value['diabetes'];
        $echo=$value['echo'];
        $ecg=$value['ecg'];
        $new_symptoms=$value['new_symptoms'];
        $ischaemia=$value['ischaemia'];
        $afib=$value['afib'];
        $result=$value['result'];   
    }
    // var_dump($gender);die();
    
    $dao->insertPatient($name,$gender,$age,$renal,$respiratory,$diabetes,$echo,$ecg,$new_symptoms,$ischaemia,$afib,$result);
    $delete_score=$dao->deleteScore($name);
    $getpatient=$dao->getData($name);
    session_start();
    unset($_SESSION['getpatient']);
    unset($_SESSION['allstudy']);
    unset($_SESSION['getallresults']);
    $msg='patient  ' . $name . '  was transferred to the All Score Patients';
    include 'index.php';
    // header('Location:index.php?msg=patient was transferred to the allstudy table');
}
public function showAllStudy(){
    session_start();
    $dao= new DAO();
    $allstudy=$dao->getAllStudyPatients();
    $_SESSION['allstudy']=$allstudy;
    // var_dump($allstudy);die();
    include 'index.php';
}
public function getSearch(){
    $name=isset($_GET['searchresult'])?$_GET['searchresult']:"";
    $searchscore=isset($_GET['searchscore'])?$_GET['searchscore']:"";
 
    // var_dump($name);die();
    if(!empty($name)){
        $dao= new DAO();
        session_start();
        $getsearch=$dao->getDataSearch($name);
        if(empty($getsearch)){
            $msg='the requested data does not exist';
            include 'index.php';
        }else{
        
        include 'index.php';
        }
    // var_dump($getsearch);die();
    }elseif(!empty($searchscore)){
        $dao= new DAO();
        session_start();
        $getsearchscore=$dao->getDataSearchScore($searchscore);
        // var_dump($getsearch);die();
        if(empty($getsearchscore)){
            $msg='the requested data does not exist';
            include 'index.php';
        }else{
        session_start();
        include 'index.php';
        }
        // session_start();
        // include 'index.php';
    }else{
          session_start();
        include 'index.php';
    }
}
public function showPatient(){
    $name=isset($_GET['name'])?$_GET['name']:"";
    $dao=new DAO();
    $getpatient=$dao->getData($name);
    session_start();
    include 'index.php';
    
}
public function showScorePatient(){
    $name=isset($_GET['name'])?$_GET['name']:"";
    $dao=new DAO();
    $getscorepatient=$dao->getScoreData($name);
    session_start();
    include 'index.php';
}





} // end Controller


?>