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
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | CUSTOMER | VIEW PROFILE<span class="back"><a href="cust1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br /><br />
      
    </div>    
    </div>
   <div class="st">
        
        <img src="imgs/profile.png" class="bodyimg">
       <br /><br /><br /></div>
       <?php
 $link=@mysqli_connect("localhost","root","","cms") or die("Erro:Unable to connect: " . mysqli_connect_error());     
  $cname=$_COOKIE["cname"];

  $sql="select * from customers where
       cust_name='$cname'";
         if($result=mysqli_query($link,$sql)){
             $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
             $name=$row["cust_name"];
             $phone=$row["phone"];
             $mail=$row["mail"];
             $address=$row["address"];
             $city=$row["city"];
             $state=$row["state"];
             $zip=$row["zip"];
       echo "<p id='par'>NAME : ".$name."</p><br />";
        echo "<p id='par1'>PHONE NUMBER : ".$phone."</p><br />";
        echo "<p id='par3'>EMAIL ID : ".$mail."</p><br />";
           echo "<p id='par2'>ADDRESS : ".$address."</p><br />";
          echo "<p id='par2'>CITY : ".$city."</p><br />";
         echo "<p id='par2'>STATE : ".$state."</p><br />";
           echo "<p id='par2'>ZIP CODE : ".$zip."</p><br />"; 
 }
?>
 </body>
</html>