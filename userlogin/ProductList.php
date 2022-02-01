<?php

function component($productname,$productprice,$productimg,$productid){
$element="  
    <li class=\"item-a\">
        <form action=\"index.php\" method=\"POST\">
          <div class=\"product-box\">
                <a href=\"\">
                    <strong>$productname</strong>
                    <img src=\"$productimg\" alt=\"\">
                    <div class=\"available-colors\">
                        <div class=\"product-color\" style=\"background-color: black;\"></div>
                        <div class=\"product-color\" style=\"background-color: white;\"></div>
                    </div>
                    <div class=\"buy-price\">
                        <p> From $productprice jod</p>
                        <hr>
                    <button type=\"submit\" class=\"btn btn-primary\" style=\"border-radius:20px;\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                    <input type='hidden' name='product_id' value='$productid'>
                    </div>
                </a>
            </div>
         </form>
    </li>
";
echo $element;
}

function cartElement($productimg,$productname,$productprice,$productid){
    $element="
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                    <img src=$productimg alt=\"imge\" style=\"max-width:100%; height:auto;\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"texxt-secondery\">Seller:SCenter</small>
                                    <br>
                                    <small class=\"texxt-secondery\">Condition:New</small>
                                    <h5 class=\"pt-2\">$productprice JOD</h5>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
    ";
    echo $element;
}
?>