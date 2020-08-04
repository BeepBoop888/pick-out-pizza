<?php 

//connect to database
$conn =mysqli_connect('host localhost', 'user beep', 'password would be here', 'name pickoutpizza');

//check connection
if (!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error();
}

?>