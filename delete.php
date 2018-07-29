<?php
include 'config.php';

$book_name=$_GET['book_name'];

$book=new Books();
$book->deleteBook($book_name);
