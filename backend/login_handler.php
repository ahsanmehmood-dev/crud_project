<?php
//check the submit type
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // fetch user details
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // check if inputs are empty or not
    $empty_inputs = empty($email) || empty($pass);
    if ($empty_inputs) {
        echo "fill out all the field";
    } else {

        // check if user exists or not
        require_once "db_connect.php";
        $query = "SELECT * FROM `users` WHERE `users`.`email`='$email'";
        $query_run = mysqli_query($connection, $query);
        $num_rows = mysqli_num_rows($query_run);
        if ($num_rows == 1) {
            //check password
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($pass == $row['password']) {
                    // creating user session
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    header("Location:../home.php?acc=success");
                } else {
                    // echo "cradientials does not matches";
                    // echo "cradientials does not matches";
                    header("Location:../home.php?pass=mismatch");
                }
            }
        } else {
            header("Location:../home.php?user=notFound");
            // echo "user does not exists";
        }
    }
} else {
    header("Location:../home.php?sys=erroe");
    // echo "invalid submit type";
}
