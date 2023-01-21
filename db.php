<?php
$connection = mysqli_connect('127.0.0.1','root','','techart');

if($connection == false){
    echo 'false';
    echo mysqli_connect_error();
    exit();
}