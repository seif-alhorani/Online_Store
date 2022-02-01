<?php
    session_start();
    if(isset($_SESSION['userlogin'])){
        header("Location:../index.php");
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--font-awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="crossorigin="anonymous" eferrerpolicy="no-referrer" />
        <!--CSS-->
        <link rel="stylesheet" href="../assets/Style/style.css">
        <!-- google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <!--Nav start-->
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="font-family:'Roboto', sans-serif; font-size: xx-large;">Electricin</a>
                    <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-user"></i></a>
                            </li>
                           
                           
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search"placeholder="Search" aria-label="Search">
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
            <section style="display: flex; justify-content: center; margin: 0% auto; padding-top: 10%;  padding-bottom: 10%; ">
                <form >
                    <h1>Sign in</h1>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" >
                      <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="login" name="button">Login</button>
                    <hr>
                    <h5 style="color: black; font-size: 15px;">Don't have an account?</h5>
                    <button type="button" class="btn btn-primary"><a href="../useraccounts/register.php" style="color: white; text-decoration: none;">Register</a></button>
                </form>
            </section>
        </main>
        <footer class="bg-primary  text-dark-50" >
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
        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--Bootstrap-->
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!-- fontawesome-->
        <script src="https://kit.fontawesome.com/2784296663.js"crossorigin="anonymous"></script>

        <script>
            $(function(){
              $('#login').click(function(e){
                 var valid = this.form.checkValidity();
                 if(valid){
                     var username = $('#username').val();
                     var password = $('#password').val();
                 }
                 e.preventDefault();
                 $.ajax({
                     type: 'POST',
                     url: 'jslogin.php',
                     data: {username : username, password : password },
                     success: function(data){
                         alert(data);
                         if($.trim(data) === "welcome"){
                             setTimeout('window.location.href = "index.php"', 2000);
                         }
                     },
                     error: function(data){
                         alert('error');
                     }
                    });
              });
            });
        </script>
        
    </body>
</html>
