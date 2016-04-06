<?php
session_start();
//include_once('inc/dbConnect.inc.php');
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "demo";

$con = mysqli_connect("localhost","root","","demo") or die("Error " . mysqli_error($con)); 
$message=array();
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
}else{
    $message[]='Please enter email';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=mysqli_real_escape_string($con,$_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);

if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $query="select * from loginjs where email='$email' and password='$password'";

    $res=mysqli_query($con,$query);
    $checkUser=mysqli_num_rows($res);
    if($checkUser > 0){
         
         $res='correct';
    }else{
         $res='ERROR enter valid credentials';
    }
  $ary=array("status"=>$res);
  echo json_encode($ary);
}

?>

