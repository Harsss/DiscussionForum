<?php
$ShowError="False";
 if($_SERVER['REQUEST_METHOD']=="POST")
 {

     include 'DbConnect.php';
     $Password=$_POST['Password'];
     $Email=$_POST['LoginEmail'];

$sql="SELECT * FROM `user` WHERE `EmailId` = '$Email'";
$result=mysqli_query($conn,$sql);
$Numrows=mysqli_num_rows($result);
if($Numrows==1)
{
$row=mysqli_fetch_assoc($result);
if(password_verify($Password,$row['PassHash']))
{
    $Name=$row['Name'];
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['EmailId']=$Email;
    $_SESSION['Name']=$Name;
    $_SESSION['Sno']=$row['Sno'];

   echo "Logged in".$Email;
   header("location: /forum/index.php");
   exit();

}
else {
    echo "Unable to login wrong pass <br>";
    header("location: /forum/index.php");
 }

}}?>
