<?php
 $ShowError="False";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {


           

           include 'DbConnect.php';
            $Username=$_POST['UserName'];
            $Email=$_POST['SignUpEmail'];
            $Password=$_POST['Password'];
            $CPassword=$_POST['ConfirmPassword'];

            //Check user id Existence
                $ExistEmail="SELECT * FROM `user` WHERE `EmailId`='$Email' ";
                $result=mysqli_query($conn,$ExistEmail);
                $Numrows=mysqli_num_rows($result);
                if($Numrows>0)
        {
            $ShowError="This Email is alraedy assigned a member";
        
        }
        else
       {
            if( $Password==$CPassword)
        {   $hash=password_hash("$Password", PASSWORD_DEFAULT);
                $sql="INSERT INTO `user` ( `Name`, `EmailId`, `Password`,`PassHash`, `Dt`) VALUES ('$Username', '$Email','$Password', '$hash', CURRENT_TIMESTAMP); ";
            $result=mysqli_query($conn,$sql);
            if($result)
                {
                    $ShowAlert=True;
                    header("Location: /Forum/index.php?signupsuccess=true");
                    exit();
                }
        }
        else
        {   $ShowError="Password do not match";}
       }
        }
        
        header("Location: /Forum/index.php?signupsuccess=false & error=$ShowError");
        ?>