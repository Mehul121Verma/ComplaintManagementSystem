<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>COMPLAINT MANAGEMENT PORTAL</title>
    <link href="styling.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <style>
        h1{
            color:white;
            font-family:Arvo,Serif;
        }
        .contactForm{
                margin-top: 50px;
                border-radius: 15px;
            }
        #lab{
            color:white;
            font-family:Arvo,Serif;
        }
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | CUSTOMER | CONTACT US<span class="back"><a href="cust1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br />
      
    </div>    
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Contact us:</h1><br />
          <?php

//Get user input
$name = isset($_POST["name"])?$_POST["name"]:" ";
$email = isset($_POST["email"])?$_POST["email"]:" ";
$message = isset($_POST["message"])?$_POST["message"]:" ";

//error messages
$missingName = '<p id="err"><strong>Please enter your name!</strong></p>'; 
$missingEmail = '<p id="err"><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p id="err"><strong>Please enter a valid email address!</strong></p>'; 
$missingMessage = '<p id="err"><strong>Please enter a message!</strong></p>'; 

//if the user has submitted the form
if(isset($_POST["submit"])){
    //check for errors
    if(!$name){
        $errors .= $missingName;  
    }else{
        $name = filter_var($name,FILTER_SANITIZE_STRING);   
    }
    if(!$email){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors .=$invalidEmail;   
        }
    }
    if(!$message){
        $errors .= $missingMessage;
    }else{
        $message = filter_var($message, FILTER_SANITIZE_STRING);   
    }
 
        //if there are any errors
    if($errors){
        //print error message
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';   
    }else{
        $to = "somyacarmel5353@gmail.com";
        $subject = "Contact";
        $message = "
        <p>Name: $name.</p>
        <p>Email: $email.</p>
        <p>Message:</p>
        <p><strong>$message</strong></p>"; 
        $headers = "Content-type: text/html";
        if(mail($to, $subject, $message, $headers)){
         $resultMessage = '<div class="alert alert-success">Thanks for your message. We will get back to you as soon as possible!</div>';  
           
        }else{
            $resultMessage = '<div class="alert alert-warning">Unable to send Email. Please try again later!</div>';  
        }
    }
    echo $resultMessage;
}
?> 
       <form action="contact.php" method="post">
                <div class="form-group">
                <label for="name" id="lab">Name:</label>
                <input type="text" name="name" class="ct" id="name" placeholder="Name" class="form-control" value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>">
           </div><br /><br />
                <div class="form-group">
                <label for="email" id="lab">Email:</label>
                <input type="email" name="email" class="ct" id="email" placeholder="Email" class="form-control" value="<?php if(isset($_POST["email"])) echo $_POST["email"];?>">
                </div><br /><br />
                <div class="form-group">
                <label for="message" id="lab">Message:</label>
                    <textarea name="message" id="message" class="form-control" class="ct1"  rows="5" cols="90"><?php if(isset($_POST["message"])) echo $_POST["message"];?></textarea>
                </div><br /><br />
                <input type="submit" name="submit" class="btn btn-success btn-lg" id="button" value="Send Message" style="background-color:#17e9ae;">
            
            </form>          
        </div>
    </div>
        </div>
       
    </body>
</html>