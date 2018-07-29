<?php
include 'user_config.php';

$name=$_POST['name'];

$password=$_POST['password'];


$user=new User();
$user->login($name,  $password);
