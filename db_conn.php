<?php 

//Enter your Host, Username,    Password , database below.
//setting the password empty nbecause i do not set password on localhost.
$con = mysqli_connect("localhost", "root", "" ,"camangles_form");
//check connection
if(mysqli_connect_error())
{
     echo "Failed to connect to Mysql:" . mysqli_connect_error();
} else {
    echo"connected successful";
}







?>

