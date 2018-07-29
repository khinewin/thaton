<?php
include 'config.php';

$cat_name=$_POST['cat_name'];

$cat=new Books();
$cat->newCategory($cat_name);