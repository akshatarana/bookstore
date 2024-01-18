<?php

$host="localhost";
$user="root";
$password="";
$dbname="book_store";

$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    die("Connection Failed:".mysqli_connect_error);
}