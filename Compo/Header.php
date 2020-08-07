<?php

session_start();
echo '<nav class="navbar navbar-expand-lg  navbar-dark bg-dark " style="min-height: 70px;">
  <a class="navbar-brand" href="/Forum">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Forum">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      
      $sql="SELECT * FROM `categories`";
      $result=mysqli_query($conn,$sql);

      while($row=mysqli_fetch_assoc($result))
    {
         echo' <a class="dropdown-item" href="http://localhost/Forum/ThreadsList.php?%20Catid='.$row['CategoryId'].'">'.$row['CategoryName'].'</a>
          ';
         

        }
     echo '  </div>
     </li>
      <li class="nav-item">
        <a class="nav-link " href="Contact.php">Contact</a>
       </li>
    </ul>
    <div class="row mx-2">';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
// session_destroy();
// exit();

 echo  '<form class="form-inline my-2 my-lg-0" method="get" action="Search.php" >
  <input class="form-control mr-sm-2" type="search" name="Search" placeholder="Search" aria-label="Search">
  <button class="btn btn-success my-2 my-sm-0" type="submit"> Submit </button>
  <p class=" mx-2 my-2 text-light"> Welcome '.$_SESSION['Name'].' </p>       
</form>



<a href="Compo/Logout.php" class="btn btn-outline-success ml-2"  >Logout</a> ';


}
else{

   echo'    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit"> Submit </button>
    </form> 
    <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#LoginModal">Login</button>

    <button type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#SignupModal">Signup</button>'
     ;
 
  } 
   

echo '</div>
  </div>
</nav>';

include "Compo/LoginModal.php";
include "Compo/SignupModal.php";

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congrats</strong> Your are now Login 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; }



?>