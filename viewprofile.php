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
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | STAFF | VIEW PROFILE<span class="back"><a href="staff1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br /><br />
      
    </div>    
    </div>
   <div class="st">
        
        <img src="imgs/staff3.png" class="bodyimg">
       <br /><br /><br /></div>
       <?php
 $link=@mysqli_connect("localhost","root","","cms") or die("Erro:Unable to connect: " . mysqli_connect_error());     
  $sname=$_COOKIE["uname"];

  $sql="select * from cms_staff where
       staff_name='$sname'";
         if($result=mysqli_query($link,$sql)){
             $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
             $name=$row["staff_name"];
             $phone=$row["phone"];
             $mail=$row["mail"];
             $city=$row["city"];
       echo "<p id='par'>NAME : ".$name."</p><br />";
        echo "<p id='par1'>PHONE NUMBER : ".$phone."</p><br />";
        echo "<p id='par3'>EMAIL ID : ".$mail."</p><br />";
           echo "<p id='par2'>CITY : ".$city."</p><br />";
 }
?>
 </body>
</html>