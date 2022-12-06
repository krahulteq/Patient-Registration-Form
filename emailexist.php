<?php

$servername = 'localhost';
$username = 'root';
$password = 'password';
$database = 'patient_registration_form';
$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $sql = " SELECT * FROM `user` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        echo "1";
    }
}
