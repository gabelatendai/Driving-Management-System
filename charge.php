<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 26/11/2019
 * Time: 16:06
 */
include ("rb.php");
R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

require_once ('stripe-php-master/init.php');
\Stripe\Stripe::setApiKey('sk_test_37wUyHvLoQHziFaMOJGRsVq0');
$token = $_POST['stripeToken'];

// charging a customer

$name_first= 'gabela';
$name_last= 'gabela';
$address= 'gabela';
$state= 'gabela';
$zip= 'gabela';
$country= 'gabela';
$phone= 'gabela';
$user_info = array("Name" =>$name_first,"LAst Name" =>$name_last,"Address" =>$address,"State" =>$state,"Zip" =>$zip,"Country" =>$country,"Phone" =>$phone);
$customer = \Stripe\Customer::create(array(
    "email" => "gmusodza@gmail.com",
    "source"=> $token,
    "metadata" => $user_info,

));

$charges = R::dispense('payments');
$charges->amount = $_POST['amount'];
$charges->user_id = $_POST['id'];
$charges->date= date('Y-m-d');
R::store($charges);

?>
    <script>
		alert('Your Payment was Succsessful');
		window.location = "index.php";
    </script>
<?php

?>