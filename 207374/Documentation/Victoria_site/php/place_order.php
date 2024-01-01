<?php
session_start();

include('php/config.php');
if(isset($_POST['Place_order'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $address=$_POST['address'];

    $conn->prepare("INSERT INTO orders(order_coast,order_status,user_id,name,email,city");



}
?>