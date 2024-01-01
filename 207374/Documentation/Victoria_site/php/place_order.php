<?php
session_start();
$_SESSION['ch']=true;
include("config.php");
if(isset($_POST['Place_order'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $phone = $_POST['phone'];
    $order_cost = $_SESSION['Ntotal'];
    $order_status = "Pending";
    $user_id = $_SESSION['user_id'];
    $order_date = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO orders(order_cost,order_status,user_id,user_phone,user_city,user_address,order_date,user_email)
                    VALUES(?,?,?,?,?,?,?,?);");
    $stmt->bind_param('isiissss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date,$email);
    $stmt->execute();
    $order_id = $stmt->insert_id;





    foreach ($_SESSION['cart'] as $key => $value){

        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name , product_image, product_price , product_quantity, user_id , order_date)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1 -> bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);

        $stmt1 -> execute();
    }
    unset($_SESSION['cart']);
    unset($_SESSION['Ntotal']);
    unset($_SESSION['total']);
    unset($_SESSION['test']);
    header('location:../order-confirmation.php');
}
?>