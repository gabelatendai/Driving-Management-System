<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 3/7/2019
 * Time: 10:17
 */

include ("rb.php");
R::setup('mysql:host=localhost;dbname=dsms', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

$init = R::findOne('users', 'id = ?', [$id]);

R::trash( $init );
print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('students.php')</script>");
?>