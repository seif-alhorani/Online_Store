<?php
require_once('config.php');
?>
<?php

    if(isset($_POST)){
        $email=       $_POST['email'];
        $firstname =  $_POST['firstname'];
        $lastname=    $_POST['lastname'];
        $phonenumber= $_POST['phonenumber'];
        $password=    $_POST['password'];
        $address=     $_POST['address'];
        $address2=    $_POST['address2'];
        $city   =     $_POST['city'];
        $zipcode =    $_POST['zipcode'];
        $age=         $_POST['age'];

        $sql="INSERT INTO users(email,firstname,lastname,phonenumber, password , address,address2, city, zipcode,age) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$email,$firstname,$lastname,$phonenumber,$password,$address,$address2,$city,$zipcode,$age]);
        if($result){
            echo'Successfully Saved';
           
        }else{
            echo'Errors While Saving';
        }
        
    }else{
        echo'no data';
    }
?>