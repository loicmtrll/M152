<?php
require "fonction.php";

$id = $_GET['id'];

if(isset($id) && $id != ""){
    deletePost($id);
    header("Location: index.php");
}else{
    header("Location: index.php");
}