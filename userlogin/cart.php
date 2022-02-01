<?php
 session_start();
 require_once("CreateDb.php");
 require_once("ProductList.php");
 $db=new CreateDb("useraccounts","Producttb");
 if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                           <a class="nav-link " aria-current="page" href=""><i class="fas fa-shopping-cart"></i>Cart 
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
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div id="shoppingcart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php
                        $total=0;
                        if(isset($_SESSION['cart'])){
                            $product_id=array_column($_SESSION['cart'],'product_id');
                            $result=$db->getData();
                            while($row=mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['id']==$id){
                                        cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                                        $total=$total+(int)$row['product_price'];
                                    }
                                }
                            }

                        }else{
                            echo"<img src=\"../assets/imges/no-item.jpg\" style=\"max-width:100%; height:auto;\">";
                        }
                    
                    ?>
                    
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count=count($_SESSION['cart']);
                                    echo"<h6>Price($count items)</h6>";
                                }else{
                                    echo"<h6>Price(0 items)</h6>";
                                }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                                <h6><?php echo $total; ?> jod</h6>
                                <h6 class="text-success">Free</h6>
                                <hr>
                                <h6><?php echo $total;?> jod</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
</body>
</html>