<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>MY Forum</title>
</head>

<body style="background-color:#002130;">
    <?php include "Compo/DbConnect.php";
  include "Compo/Header.php";
 
  ?>
    <?php
    $id=$_GET['ThreadId'];
$sql= "SELECT * FROM `threads` WHERE `ThreadId` = $id";
$result=mysqli_query($conn,$sql);    

while($row=mysqli_fetch_assoc($result))
{
$Title= $row['ThreadTitle'];
$Description= $row['ThreadDesc'];
$AskerId= $row['ThreadUserId'];
$sql2="SELECT `Name` FROM `user` WHERE `Sno` = '$AskerId'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$AskerName=$row2['Name'];
}
?>



<?php

$showAlert =FALSE;
$method=$_SERVER['REQUEST_METHOD'];

if($method=='POST')
{
    
 $Comment=$_POST['Comment'];
 $Comment=str_replace("<","&lt;","$Comment");
 $Comment=str_replace(">","&gt;","$Comment");
 
 $Sno=$_POST['Sno'];

 $sql="INSERT INTO `comments` ( `CommentUser`, `CommentContent`, `ThreadId`, `CommentTime`) 
 VALUES ( '$Sno', '$Comment', '$id', CURRENT_TIMESTAMP);";
 
 
 $result=mysqli_query($conn,$sql);
$showAlert =True;
if($showAlert)
{  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congrats</strong> Your Comment has been added, 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'; }
}
?>




    <div class="container my-4">



        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $Title; ?> Forum</h1>
            <p class="lead"><?php echo $Description;  ?></p>
            <hr class="my-4">
            <p> Best Place For sharing and enhancing your Knowledge <br></p>
            <h3> Forum rules</h3> <br>
            <p>No Spam / Advertising / Self-promote in the forums.
                Do not cross post questions.
                Remain respectful of other members at all times. </p>
            <p class="lead">
            <p> <b> Asked by:<?php echo $AskerName; ?>  </b> </p>
            </p>
        </div>

    </div>




 <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo  '
        <div class="container my-5 text-light">

        <center>
            <H1 class="my-6rem"> Post Your Comment </H1>
        </center>
        <form action="'.$_SERVER["REQUEST_URI"].' " method="post">


            <div class="form-group">
                <label for="Comment">Give Your Comment</label>
                <textarea class="form-control" id="Comment" name="Comment" rows="6"></textarea>
                <input type="hidden" name="Sno" value="'.$_SESSION["Sno"].'">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
}
          else{
             echo '<div class="container my-5 text-light">
             <center>
                      <H1 class="my-6rem"> Post Your Comment </H1>
                  
                  <h3 class="text-light my-5">You are not log in </h3> </center> </div>';
             
          }
    
    
    ?>
    <div class="container text-light">

        <H1 class="my-6rem"> Discussions </H1>


        <?php
    $CatId=$_GET['ThreadId'];
$sql= "SELECT * FROM `comments` WHERE `ThreadId` = $CatId";
$result=mysqli_query($conn,$sql);    
$ThreadGet=False; // To check is we get any column for that cat from the database



while($row=mysqli_fetch_assoc($result))
{
 $ThreadGet=True;
$Content= $row['CommentContent'];
$Id=$row['CommentId'];
$Time=$row['CommentTime'];
$UserId=$row['CommentUser'];


$sql2="SELECT `Name` FROM `user` WHERE `Sno` = '$UserId'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);


echo '       <div class="media my-4">
            <img class="mr-3 my-4" src="Images/user.png" width="80px" Height="80px" alt="Generic placeholder image">
            <div class="media-body my-4">
            <p class="font-weight-bold my-0"> Comment by  '.$row2['Name'].' at '.$Time.' </p>
                '.$Content.'
        
            </div>
        </div>'; }


        if(!$ThreadGet)
        {echo '
            <div class="mt-5 jumbotron  jumbotron-fluid text-light" style="background-color:#333333;">
  <div class="container ">
    <h1 class="display-4">No results Found</h1>
    <p class="lead">Be the first one to explore the topic</p>
  </div>
</div>'; }







        ?>
    </div>
    <?php
  include "Compo/Footer.php";
  ?>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>