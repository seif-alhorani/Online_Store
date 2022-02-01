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
    require_once("ProductList.php");
    require_once("CreateDb.php");
    $database=new CreateDb("useraccounts","Producttb");
    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
           $item_array_id = array_column($_SESSION['cart'],"product_id");
            
            if(in_array($_POST['product_id'],$item_array_id)){
                echo"<script>alert('Product is already add')</script>";
                echo"<script>window.locatio='index.php'</script>";
            }else{
                $count=count($_SESSION['cart']);
                $item_array=array(
                    'product_id'=>$_POST['product_id']
                );
                $_SESSION['cart'][$count]=$item_array;
                
            }
        }else{
            $item_array=array(
                'product_id'=>$_POST['product_id']
            );
            $_SESSION['cart'][0]=$item_array;
            
        }

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
    <!--Light Slider CDN css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a class="nav-link" href="Checkin.php"><i class="fas fa-address-card"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="index.php?logout=true"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                        <li class="nav-item" >
                           <a class="nav-link " aria-current="page" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart 
                              <?php 
                                if(isset($_SESSION['cart'])){
                                    $count=count($_SESSION['cart']);
                                    echo" <span id=\"cart_count\" class=\"bg-white\">$count</span>";
                                }else{
                                    
                                    echo" <span id=\"cart_count\" class=\"bg-white\">0</span>";
                                }
                              ?>
                           </a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    
                </div>
            </div>
        </nav>
        <!--Nav End-->
    </header>
    <main>
        <section class="p-3">
            <!--PillsNav Start-->
            <ul class="nav nav-pill d-flex justify-content-between bg-white">
                <h1 style="color:blue;">Welcome</h1>
                <!--
                <div class="dropdown">
                    <a class="btn btn-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Shop by
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Deals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gifts</a>
                </li>
                -->
            </ul>
            <!--PillsNav End-->
            <!-- Slider Start-->
            <div id="carouselExampleCaptions" class="carousel slide p-3" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/imges/c-d-x-PDX_a_82obo-unsplash_3_345x90.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block"></div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imges/huawei-mateview-gt-se-wide-color-gamut2x_345x90.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block"> </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imges/iphoneSlider.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block"></div>
                    </div>
                </div>
                <button class="carousel-control-prev visually-hidden" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next visually-hidden" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Slider End--> 
            <!-- Product slider Start here-->
                   <div class="product-slider">
                        <div class="slider-heading">
                            <h3>All Models.<span>Take your pick</span></h3>
                        </div>
                        <ul id="autoWidth" class="cs-hidden">
                            <?php
                                $result=$database->getData();
                                while($row=mysqli_fetch_assoc($result)){
                                    component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                                }
                              
                            ?>
                            
                        </ul>
                    </div>
            <!-- Product slider  End here-->
        </section>
    </main>
    <footer class="bg-primary  text-dark -50" >
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
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--LightSider CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });
    </script>

</body>

</html>
