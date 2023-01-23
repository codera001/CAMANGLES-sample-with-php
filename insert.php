<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="camangless.html">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<?php
require 'db_conn.php';

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    

$sql = "INSERT INTO `form` (`form_name`,`form_email`,`form_message`)
VALUES ('$name','$email','$message')";
$result = mysqli_query($con, $sql);
if ($result) {
   echo "New record has been added successfully !";
} else {
   echo "Error: " . $sql . ":-" . mysqli_error($con);
}
mysqli_close($con);





$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }



    if (empty($_POST["message"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["message"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>