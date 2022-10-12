

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SIGNUP</title>




</head>
<body>
    <div class='container'>
        <div class="row">
            <div class="col-6 mx-auto shadow p-5">
            <?php
            session_start();
        require 'dbcred.php';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $email;
            $query = "SELECT * FROM users WHERE email=  '$email'";
            $queryDb = $connectDb->query($query);

            if ($queryDb->num_rows > 0) {
                $userDetails = $queryDb->fetch_assoc ();
                $pass = $userDetails['password'];
                $verify = password_verify($password, $pass);
                if ($verify) {
                    $_SESSION['user_id']= $userDetails['user_id'];
                    header("Location: dashboard.php");
                } else {
                    echo "<div class='alert alert-danger text-center'> Incorrect Password .</div>";
                }
            }else{
                echo "<div class='alert alert-danger text-center'> Invalid Login Details.</div>";
            }
        }


    ?>
               <!-- <form action=<?php echo $_SERVER['PHP_SELF'] ?> method='POST'> -->
               <form action='injectSignin.php' method='POST'>
                <h3 class='text-center'>SIGNIN</h3>
                <input type="email" placeholder='Email' name='email' class='form-control mb-3'>
                <input type="password" placeholder='Password' name='password' class='form-control mb-3'>
                <input type="submit" class='btn btn-success w-100' name='submit' value='submit'>
                <!-- <button class='btn btn-success '>SIGNUP</button> -->
               </form>
            </div>
        </div>
    </div>
</body>
</html>