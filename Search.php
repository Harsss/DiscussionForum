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
    include "Compo/DbConnect.php";
  include "Compo/Header.php";?>

    <div class="container text-light my-3">
        <h1>Search Results for <em><?php echo $_GET['Search']; ?> </em></h1>
        <div class="result my-5">



        



        <?php $qu=$_GET["Search"];
         $sql= "SELECT * FROM `threads` where match(ThreadTitle, ThreadDesc) against('$qu')";
  $result=mysqli_query($conn,$sql);    
  
 



  
 $Noresult=true;
 while($row=mysqli_fetch_assoc($result))
  {
  $Title= $row['ThreadTitle'];
  $Description= $row['ThreadDesc'];
  $Id= $row['ThreadId'];
  $url="Threads.php?ThreadId='.$Id.'";
  $Noresult=false;
    echo '
    
    <h3> <a href="'.$url.'" class="text-warning">  '. $Title .'   </a></h3>

   '.$Description.'
';

}
 
 if($Noresult)
 {
    echo '<div class="mt-5 jumbotron  jumbotron-fluid text-light" style="background-color:#333333;">
  <div class="container ">
    <h1 class="display-4">No results Found</h1>
    <p class="lead">Suggestions:</ul>

 <li>                       Make sure that all words are spelled correctly.
                       <li> Try different keywords.</li>
                       <li> Try more general keywords.</li>
                       <li> Try fewer keywords.</li><ul>
                        </p>
  </div>
</div>';

 }
  
 




  ?>




    </div>


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