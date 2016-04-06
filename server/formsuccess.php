<html>
    <head>
        
        
    </head>
    
        <body>	
   

</div>
    </body>
</html>
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


if (isset($_POST['date']))
     {
    $date=$_REQUEST['date'];
    
     }
$date=date("Y-m-d h:i:s",strtotime($date));

$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');       

   $query=mysqli_query($connecDB,"insert into `signup` values('NULL','".$username."','".$password."','".$date."','".$gen."','".$tel."','".$email."')");

$res=mysqli_query($connecDB,$query);
$idname= mysqli_insert_id($connecDB);
mysqli_query($connecDB,"insert into `loginjs` values('NULL','".$username."','".$password."')");


         
    echo 'correct';
    
  

        mysqli_close($connecDB);
?>

