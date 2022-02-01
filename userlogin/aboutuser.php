<?php
    session_start();
    if(!isset($_SESSION['userlogin'])){
        header("Location:login.php");
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location:login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Made by Saif Alhorani-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricin</title>
    <!--Styles-->
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" eferrerpolicy="no-referrer" />
    <!--CSS-->
    <link rel="stylesheet" href="../assets/Style/style.css">
    <!-- google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
        table, th, td {
            border: 1px solid black;
            
        }
    </style>
</head>

<body>
    <header>
        <!--Nav start-->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"
                style="font-family:'Roboto', sans-serif; font-size: xx-large;">Electricin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="index.php?logout=true"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <!--
                    Cart
                    <form action="#" class="">
                        <a href="#" class=" rounded-pill ">
                            <span class="font-size-16 px-2 text-white "><i class="fas fa-shopping-cart"></i></span>
                            <span class="px-3 py-2 rounded-pill text-dark bg-light ">0</span>
                        </a>
                    </form>
                -->
            </div>
        </div>
    </nav>
    <!--Nav End-->
</header>
<main>
    <?php
            if(isset($_GET['password'])){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db_name="useraccounts";

                // Create connection
                $conn = new mysqli($servername, $username, $password,$db_name);

                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $password=$_GET['password'];
                $sql = "SELECT * FROM users WHERE password='$password'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    
                    while($row= $result->fetch_assoc()){
                        $email = $row['email'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $phonenumber = $row['phonenumber'];
                        $address = $row['address'];
                        $address2 = $row['address2'];
                        $city = $row['city'];
                        $zipcode = $row['zipcode'];
                        $age = $row['age'];
                    }
                        
                }
            }else die("No user name");
        ?>
        <center >
            <table >
                <tr><td>Email</td><td><?php echo $email;?></td></tr>
                <tr><td>Firstname</td><td><?php echo $firstname;?></td></tr>
                <tr><td>Lastname</td><td><?php echo $lastname;?></td></tr>
                <tr><td>phonenumber</td><td><?php echo $phonenumber;?></td></tr>
                <tr><td>address</td><td><?php echo $address;?></td></tr>
                <tr><td>address2</td><td><?php echo $address2;?></td></tr>
                <tr><td>City</td><td><?php echo $city;?></td></tr>
                <tr><td>Zipcode</td><td><?php echo $zipcode;?></td></tr>
                <tr><td>age</td><td><?php echo $age;?></td></tr>
    
            </table>
        </center>
    </main>
    <footer class="bg-primary  text-dark -50" style="padding-bottom:0;">
        <div class="container">
            <div class="row">
              <div class="col">
                <h1>Electricin</h1>
              </div>
              <div class="col">
                <p>Electricin™ was launched in Jordan in 2022 to give consumers with full shopping experience for consumer electronics and household appliances.</p>
              </div>
              <div class="col">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
              </div>
            </div>
        </div>
    </footer>
   
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!-- fontawesome-->
    <script src="https://kit.fontawesome.com/2784296663.js" crossorigin="anonymous"></script>
    
</body>

</html>