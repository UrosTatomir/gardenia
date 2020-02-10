<?php 
require_once '../config/db.php';

class DAO{
private $db;
private $INSERTGARDENIA="INSERT INTO patients(name,gender,age,renal,respiratory,diabetes,echo,ecg,new_symptoms,ischaemia,afib,result) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
private $GETDATA="SELECT * FROM patients WHERE name=?";
private $GETPATIENTNAME="SELECT name FROM patients WHERE name=?";
private $REGISTER = "INSERT INTO users(name,surname,email,password,active,admin) VALUES(?,?,?,?,?,?)";
private $LOGIN ="SELECT * FROM users WHERE name = ? AND password = ?";
private $GETALLUSERS="SELECT * FROM users";
private $DELETESCORE="DELETE FROM patients WHERE name=?";
private $GETALLRESULTS="SELECT * FROM patients";
private $INSERTSTUDYPATIENT="INSERT INTO studypatients(name,gender,age,renal,respiratory,diabetes,echo,ecg,new_symptoms,ischaemia,afib,result) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
private $GETALLSTUDYPATIENTS="SELECT * FROM studypatients";
private $DATASEARCH="SELECT * FROM patients WHERE name LIKE CONCAT( :name, '%') ";  //zapamtiti foru obavezno
private $DATASEARCHSCORE="SELECT * FROM studypatients WHERE name LIKE CONCAT( :name, '%') ";
private $GETSCOREDATA="SELECT * FROM studypatients WHERE name=?";

public function __construct(){
    $this->db=DB::createInstance();
}
public function insertData($nam,$gend,$ag,$ren,$resp,$diab,$ech,$ec,$n,$isc,$afi,$result){
    $statement = $this->db->prepare($this->INSERTGARDENIA);
    $statement->bindValue(1,$nam);
    $statement->bindValue(2,$gend);
    $statement->bindValue(3,$ag);
    $statement->bindValue(4,$ren);
    $statement->bindValue(5,$resp);
    $statement->bindValue(6,$diab);
    $statement->bindValue(7,$ech);
    $statement->bindValue(8,$ec);
    $statement->bindValue(9,$n);
    $statement->bindValue(10,$isc);
    $statement->bindValue(11,$afi);
    $statement->bindValue(12,$result);
    $statement->execute(); 
}
public function getData($name){
    $statement=$this->db->prepare($this->GETDATA);
    $statement->bindValue(1,$name);
    $statement->execute();
    $result=$statement->fetchAll() ;
    return $result;
}
public function getName($name){
    $statement=$this->db->prepare($this->GETPATIENTNAME);
    $statement->bindValue(1,$name);
    $statement->execute();
    $result=$statement->fetch() ;
    return $result;
}
public function register($name,$surname ,$email,$password,$active,$admin) {
    $statement = $this->db->prepare($this->REGISTER);
    $statement->bindValue(1,$name);
    $statement->bindValue(2,$surname);
    $statement->bindValue(3,$email);
    $statement->bindValue(4,$password);
    $statement->bindValue(5,$active);
    $statement->bindValue(6,$admin);
    $statement->execute();    
}
public function login($name,$password){
        $statement=$this->db->prepare($this->LOGIN);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$password);
        $statement->execute();
        $result=$statement->fetch() ;
        return $result;
}
public function getAllUsers(){
  
    $statement=$this->db->prepare($this->GETALLUSERS);
    $statement->execute();
    $result= $statement->fetchAll();
    return $result;
}
public function deleteScore($name){
    $statement = $this->db->prepare($this->DELETESCORE);
    $statement->bindValue(1,$name);
    $statement->execute();
   
}
public function getAll(){
    $statement=$this->db->prepare($this->GETALLRESULTS);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
}
public function insertPatient($name,$gender,$age,$renal,$respiratory,$diabetes,$echo,$ecg,$new_symptoms,$ischaemia,$afib,$result){
    $statement = $this->db->prepare($this->INSERTSTUDYPATIENT);
    $statement->bindValue(1,$name);
    $statement->bindValue(2,$gender);
    $statement->bindValue(3,$age);
    $statement->bindValue(4,$renal);
    $statement->bindValue(5,$respiratory);
    $statement->bindValue(6,$diabetes);
    $statement->bindValue(7,$echo);
    $statement->bindValue(8,$ecg);
    $statement->bindValue(9,$new_symptoms);
    $statement->bindValue(10,$ischaemia);
    $statement->bindValue(11,$afib);
    $statement->bindValue(12,$result);
    $statement->execute(); 
}
public function getAllStudyPatients(){
    $statement=$this->db->prepare($this->GETALLSTUDYPATIENTS);
    $statement->execute();
    $result= $statement->fetchAll();
    return $result;
}
public function getDataSearch($name){
    $statement=$this->db->prepare($this->DATASEARCH);
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->execute();
    $result= $statement->fetchAll();
    return $result;
}
public function getDataSearchScore($searchscore){
    $statement=$this->db->prepare($this->DATASEARCHSCORE);
    $statement->bindValue(':name', $searchscore, PDO::PARAM_STR);
    $statement->execute();
    $result= $statement->fetchAll();
    return $result;
}
public function getScoreData($name){
    $statement=$this->db->prepare($this->GETSCOREDATA);
    $statement->bindValue(1,$name);
    $statement->execute();
    $result=$statement->fetchAll() ;
    return $result;
}



}//end DAO  class

?>