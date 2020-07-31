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

<body>
    <?php
  include "Compo/Header.php";
  include "Compo/DbConnect.php";
  ?>
    <?php
    $id=$_GET['ThreadId'];
$sql= "SELECT * FROM `threads` WHERE `ThreadId` = $id";
$result=mysqli_query($conn,$sql);    

while($row=mysqli_fetch_assoc($result))
{
$Title= $row['ThreadTitle'];
$Description= $row['ThreadDesc'];

}
?>


    <div class="container my-4">

        <!-- 
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $Title; ?> Forum</h1>
            <p class="lead"><?php echo $Description;  ?></p>
            <hr class="my-4">


            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div> -->


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
                <p> <b> Posted by: ME </b> </p>
            </p>
        </div>

    </div>
    <div class="container">

        <H1 class="my-6rem"> Discussions </H1>
        <?php
//     $CatId=$_GET['Catid'];
// $sql= "SELECT * FROM `threads` WHERE `ThreadCatId` = $CatId";
// $result=mysqli_query($conn,$sql);    

// while($row=mysqli_fetch_assoc($result))
// {
// $Title= $row['ThreadTitle'];
// $Desc= $row['ThreadDesc'];
// $Id=$row['ThreadId'];

// echo '       <div class="media my-4">
//             <img class="mr-3 my-4" src="Images/user.png" width="80px" Height="80px" alt="Generic placeholder image">
//             <div class="media-body my-4">
//                 <h5 class="mt-0"> <a href="Threads.php?ThreadId='.$Id.'">'.$Title.'</a></h5> 
//                 '.$Desc.'
        
//             </div>
//         </div>'; } ?>




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