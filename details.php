<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>COMPLAINT MANAGEMENT PORTAL</title>
    <link href="styling.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <div id="contain">
   
        <h2 id="detail"><u>Enter your details:</u><br /><br /><br /></h2>    
    </div>   
    <?php
    $link=@mysqli_connect("localhost","root","","cms") or die("Erro:Unable to connect: " . mysqli_connect_error());
$mobile=isset($_POST["mob"])?$_POST["mob"]:" ";
$email=isset($_POST["mail"])?$_POST["mail"]:" ";
 $addr=isset($_POST["address"])?$_POST["address"]:" ";
$city=isset($_POST["city"])?$_POST["city"]:" ";
$state=isset($_POST["state"])?$_POST["state"]:" ";
$zip=isset($_POST["zip"])?$_POST["zip"]:" ";
//error messages


//if the user has submitted the form
if(isset($_POST["submit"])){
    
    if($mobile && $email && $addr && $city && $state && $zip && filter_var($email,FILTER_VALIDATE_EMAIL) && preg_match("/^[0-9]{6}$/",$zip) && preg_match("/^[0-9]{10}$/",$mobile)){
        $var=$_COOKIE["name"];
        $var1=$_COOKIE["pass"];
 
        $sql="SELECT user_id from users where user_name='$var'";
         if($result=mysqli_query($link,$sql)){
           $row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
            $val=$row["user_id"];
            $sql1="INSERT into customers(cust_id,cust_name,phone,mail,address,city,state,zip,password) VALUES('$val','$var','$mobile','$email','$addr','$city','$state','$zip','$var1')";
              if($res=mysqli_query($link,$sql1)){
        header("Location:logincust.php");
        exit();
              }
    }
    }
    //check for errors
   if(!$mobile || !$email || !$addr || !$city || !$state || !$zip){
        echo "<p id='errx'>You are required to fill all the entries!</p>";
    }else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "<p id='errx1'>Enter a valid e-mail id!</p>";  
        } 
        if(!preg_match("/^[0-9]{6}$/",$zip)){
            echo "<p id='errx2'>The zip code should be a 6-digit number!</p>";
        }
        if(!preg_match("/^[0-9]{10}$/",$mobile)){
            echo "<p id='errx2'>The mobile number should be a 10-digit number!</p>";
        }
    }
}
?>
    <div class="adds" id="adds1">  
    <form method="post" action="details.php">
      <div class="form-group">
      <input type="text" class="ut1" name="mob" id="mobuser" placeholder="Enter mobile number" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["mob"])) echo $_POST["mob"];?>"></div>
         <br />
          <div class="form-group">
              <input type="text" class="ut1" name="mail" id="emailuser" placeholder="Enter email id"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"];?>"> </div>
    
     <br />
        <div class="form-group">
            <input type="text" class="ut1" name="address" id="addressuser" placeholder="Enter address"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["address"])) echo $_POST["address"];?>"> </div> <br />
        <div class="form-group">
            <input type="text" class="ut1" name="city" id="cityuser" placeholder="Enter city"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["city"])) echo $_POST["city"];?>"> </div> <br />
        <div class="form-group">
            <input type="text" class="ut1" id="state" name="state" placeholder="Enter state"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["state"])) echo $_POST["state"];?>"> </div> <br />
         <div class="form-group">
             <input type="text" class="ut1" id="zip" name="zip" placeholder="Enter zip code"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["zip"])) echo $_POST["zip"];?>" > </div> <br />
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="CONFIRM" style="background-color:#17e9ae;"> 
          </form>
    </div>
    
    </body>
</html>
<?php
ob_flush();
?>