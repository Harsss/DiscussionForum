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
    <?php
  include "Compo/Header.php";
  include "Compo/DbConnect.php";
  ?>







    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="Images/ju.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/19.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/ui.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/op.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/16.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/12.jpg" height="550rem">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Images/9.jpg" height="550rem">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="Images/11.jpg" height="550rem">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>






    <div class="container">
        <h2 class="text-center my-3 text-warning"> Welcome To Forum </h2>

        <div class="row">

            <!-- FetCh ALl the categories -->
            <?php             
      $sql="SELECT * FROM `categories`";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $CatName= $row['CategoryName'];
        $CatDesc= $row['Description'];
        $ID= $row['CategoryId'];

        echo '   <div class="col-md-4">
        <div class="card mt-3 mb-5" style="width: 18rem; height: 31rem">
            <img class="card-img-top" src="Images/Card'.$ID.'.jpg" height="236px">
            <div class="card-body my-3">
                <h5 class="card-title"> <a href="ThreadsList.php? Catid='. $ID .'">'.$CatName .' </a> </h5>
                <p class="card-text">
                '. substr($CatDesc,0,100) .'......</p>
                <a href="Threadslist.php? Catid='. $ID .'" class="btn btn-primary">View Threads</a>
            </div>
        </div>

    </div> <!-- col-md ka div -->';
      }
?>
</div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->










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