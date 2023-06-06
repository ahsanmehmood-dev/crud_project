<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // fetching user data

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // checking if input are empty or not
        if(empty($fullname) || empty($email) || empty($password) || empty($confirm_password)){
            // throw error
            echo "Fill out all the fields";
        }else{

            //checkif password match or not
            if($password === $confirm_password){
                // echo "password  matches";

                require_once "db_connect.php";


                $email_check_query = "SELECT * FROM `users` WHERE `users`.`email`='$email'";
                $run = mysqli_query($connection,$email_check_query);
                $num_of_rows = mysqli_num_rows($run);

                if($num_of_rows < 1){


                    $account_creation = "INSERT INTO `users` ( `name`, `email`, `password`) VALUES ( '$fullname', '$email', '$confirm_password');";


                    $account_run = mysqli_query($connection,$account_creation);

                    if($account_run){
                        echo "account created";
                    }


                }else{
                    echo "account already exist please login";
                }


            }else{
                echo "password does not matches";
            }
        }
    }else{
        // GET


        echo "form submit type is invalid";
    }

    

?>