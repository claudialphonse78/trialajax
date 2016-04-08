
<?php
###### db ##########
$db_username = 'root';
$db_password = '';
$db_name = 'demo';
$db_host = 'localhost';

################
$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$gen=$_REQUEST['gender'];
$password=$_REQUEST['password'];
$tel=$_REQUEST['phone'];

$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');       
if (isset($_POST['date']))
     {
    $date=$_REQUEST['date'];
    
     }
$date=date("Y-m-d h:i:s",strtotime($date));
if(isset($_POST['username'])){
    $query2=  mysqli_query($connecDB, "insert into `signup` values('NULL','".$username."','".$password."','".$date."','".$gen."','".$tel."','".$email."')");
    $query1="insert into `loginjs` values('NULL','".$email."','".$password."')";
$response=mysqli_query($connecDB,$query1);
    $response_array = array();
    
  $response_array['status'] = 'correct';
  echo json_encode($response_array);
}
      mysqli_close($connecDB);
?>

