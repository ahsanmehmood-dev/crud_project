<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .form {
        /* border: 2px solid red; */
        border-radius: 8px;
        padding: 3rem;
        display: flex;
        justify-content: center;
        /* align-items: center; */
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);



    }

    .ss {
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);


    }

    h1 {
        border-left: 8px solid red;
        padding-left: 10px;
    }


    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* h2 {
        padding-top: 40px;
    } */
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <div class="btn btn-outline-primary text-light">
                        <?php
                        session_start();
                        echo $_SESSION['name'];
                        ?>
                    </div>
                    <a href="backend/logout_handler.php" class="btn btn-outline-danger ms-3">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <section id="app" class="grad-1">
        <center>
            <h2 class="pt-5">Take control of what to do by <span class="text-secondary">iTODO</span> </h2>
        </center>
        <div class="container d-flex justify-content-center align-item-center">
            <div class="form  w-50 d-flex justify-content-center align-item-center flex-column m-4 shadow-lg">
                <form action="backend/todo_handler.php" method='POST'>
                    <div class="mb-3">
                        <h1>Create iTODO</h1>
                        <label for="exampleFormControlInput1" class="form-label">Enter Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Enter Phone NO:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
                    </div>


                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>

        </div>
    </section>
    <div class="container">

        <table class="table border">
            <thead>
                <tr class="ss">
                    <th scope="col">#</th>
                    <th scope="col">Todo</th>
                    <th scope="col">phone</th>
                    <th scope="col">title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once "backend/db_connect.php";
                $user_id = $_SESSION['id'];
                $query = "SELECT * FROM `todo` WHERE `todo`.`user_id`='$user_id'";
                //  echo var_dump($query);
                $run = mysqli_query($connection, $query);
                $num_rows = mysqli_num_rows($run);
                if ($num_rows > 0) {



                    while ($row = mysqli_fetch_assoc($run)) {



                        echo '
                <tr>
                    <th scope="row">' . $row['id'] . '</th>
                    <td>' . $row['todo_name'] . '</td>
                    <td>' . $row['todo_phone'] . '</td>
                    <td>' . $row['todo_title'] . '</td>
                    <td>' . $row['todo_desc'] . '</td>
                    
                    <td>
                        <button type="button" class="btn btn-primary mx-1">Edit</button>
                        <button type="button" class="btn btn-warning mx-1">View All</button>
                        <button type="button" class="btn btn-danger mx-1">Delete</button>
                    </td>
                </tr>';
                    }
                }else{
                    echo "<h1>No TODO found</h1>";
                }
                
                ?>

            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>