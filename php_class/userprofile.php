<?php
    require 'dbcred.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        // $userDetails = $_SESSION['userDetails'];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE `user_id` = '$user_id'";
        $queryDb = $connectDb->query($query);
        $userDetails = $queryDb->fetch_assoc();

    }else{
        header('Location: signin.php');
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="seller.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./sidebar.css">
    <title>Document</title>
</head>
<body>
<div class="l-navbar w-z5 bg-primary" id="nav-bar">
      <nav class="nav w-100">
        <div> 
          <a href="#" class="nav_logo"><i class='nav_logo-icon h6'>PA</i> <span class="nav_logo-name"></span> </a>
                <div class="nav_list"> <a href="/both/php_class/dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                 <a href="/both/php_class/userprofile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile</span> </a> 
                 <a href="#" class="nav_link"><i class='bx bx-grid nav_icon'></i> <span class="nav_name"></span> </a> 
                 <a href="#" class="nav_link"><i class='bx bx-cart nav_icon'></i> <span class="nav_name"></span> </a> 
                 <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>-->
                 </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
   <div class="container">
   <div class="row">
        <div class="col-4 mx-auto  p-2">
             <div class="shadow p-2 mx-auto">
           <div class='fw-bold'>
            Welcome: 
           <?php  
                echo $userDetails['first_name'];
            ?>
           </div>
                <form action="process_prf_pic.php" method='post' enctype='multipart/form-data'>
                    <input type="file" name='profilePic'><br><br>
                    <button type='submit' name="submit" class='btn btn-dark btn-sm'>Upload Picture</button><br><br>
                    <img src="uploads/<?php echo $userDetails['prf_pic'];?>" alt="" style='width:55%;height:30vh;border-radius:100%;'>
                </form>
             </div>
        </div>
    </div>
   </div>
<script src="./sidebar.js"></script>
</body>
</html>