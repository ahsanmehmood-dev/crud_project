<?php
// echo "came the right way";
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $user_id = $_SESSION['id'];
    if(empty($name) || empty($phone) || empty($title) || empty($desc)){
        echo "fill out all the fields";
    }else{
        require_once "db_connect.php";
        $insertion_query = "INSERT INTO `todo` ( `todo_name`, `todo_phone`, `todo_title`, `todo_desc`, `user_id`) VALUES ( '$name', '$phone', '$title', '$desc', '$user_id');";
        echo $insertion_query;
        $insertion_query_run = mysqli_query($connection,$insertion_query);
        if($insertion_query){
            echo "todo added";
        }else{
            echo "todo insertion failed";
        }
    }



}else{
    echo "GET method detected";
}




?>