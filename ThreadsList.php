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
    $id=$_GET['Catid'];
$sql= "SELECT * FROM `categories` WHERE `CategoryId` = $id";
$result=mysqli_query($conn,$sql);    

while($row=mysqli_fetch_assoc($result))
{
$CatName= $row['CategoryName'];
$CatDesc= $row['Description'];

}
?>


    <div class="container my-4">


        <div class="jumbotron text-light" style="background-color:#333333;">
            <h1 class="display-4 ">Welcome to <?php echo $CatName; ?> Forum</h1>
            <p class="lead "><?php echo $CatDesc;  ?></p>
            <hr class="my-4">
            <p> Best Place For sharing and enhancing your Knowledge <br></p>
            <h3> Forum rules</h3> <br>
            <p>No Spam / Advertising / Self-promote in the forums. <br>
                Do not cross post questions. <br>
                Remain respectful of other members at all times. </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>

    </div>
    <hr>
    <div class="container my-5">

    
    <center>
            <H1 class="my-6rem"> Start a New Discussion </H1>
        </center>
        <form>
            <div class="form-group ">
                <label for="ProblemTitle">Question Title </label>
                <input type="Text" class="form-control" id="ProblemTitle" name="ProblemTitle"
                    aria-describedby="TitleHelp">
                <small id="TitleHelp" class="form-text text-muted">Keep your Title as crisp as possible </small>
            </div>

            <div class="form-group">
                <label for="Description">Elaborate Your Concern</label>
                <textarea class="form-control" id="Description" name="Description" rows="6"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


<hr>
    <div class="container">

        <center>
            <H1 class="my-6rem"> Browse Questions </H1>
        </center>
        <?php
    $CatId=$_GET['Catid'];
$sql= "SELECT * FROM `threads` WHERE `ThreadCatId` = $CatId";
$result=mysqli_query($conn,$sql);    
$ThreadGet=False; // To check is we get any column for that cat from the database



while($row=mysqli_fetch_assoc($result))
{
 $ThreadGet=True;
$Title= $row['ThreadTitle'];
$Desc= $row['ThreadDesc'];
$Id=$row['ThreadId'];

echo '       <div class="media my-4">
            <img class="mr-3 my-4" src="Images/user.png" width="80px" Height="80px" alt="Generic placeholder image">
            <div class="media-body my-4">
                <h5 class="mt-0"> <a href="Threads.php?ThreadId='.$Id.'">'.$Title.'</a></h5> 
                '.$Desc.'
        
            </div>
        </div>'; }


        if(!$ThreadGet)
        {echo '
            <div class="mt-5 jumbotron  jumbotron-fluid text-light" style="background-color:#333333;">
  <div class="container ">
    <h1 class="display-4">No results Found</h1>
    <p class="lead">Be the first one to explore the topic</p>
  </div>
</div>
            
            
            
             '; }







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