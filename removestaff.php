<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>COMPLAINT MANAGEMENT PORTAL</title>
    <link href="styling.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
     <style>
        #adder{
            color:red;
           transform:translate(550px,17px);  
        }
        #rem{
            color:#17e9ae;
           transform:translate(540px,17.5px);  
        } 
       #rem1{
            color:red;
           transform:translate(550px,17.5px);  
        }  
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | ADMIN | REMOVE STAFF<span class="back"><a href="admin1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br />
        <h2 id="add2"><u>Enter credentials of the staff :</u></h2>    
    </div>    
    </div>
     <?php
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
$name = isset($_POST["staffname"])?$_POST["staffname"]:" ";
$sid = isset($_POST["staffid"])?$_POST["staffid"]:" ";      
$x=0;
//if the user has submitted the form
if(isset($_POST["submit"])){
    //check for errors
    if(!$name || !$sid){
        echo "<p id='adder'>You are required to fill all the entries!</p>";  
    }
   else
    {   
      $name=mysqli_real_escape_string($link,$name);
 $sid=mysqli_real_escape_string($link,$sid);
    $sql="SELECT comp_id from complaint where staff_id='$sid'";
        if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)==0)
           {
               $x=1;
           }
            else{
            $sql1="SELECT comp_id from complaint where staff_id='$sid' AND status!='completed'";
            if($res=mysqli_query($link,$sql1)){
              if(mysqli_num_rows($res)==0){
                  $x=1;
              }    
            }
            }
        }
       if($x==1){
           $del1="DELETE from complaint where staff_id='$sid'";
            if($result=mysqli_query($link,$del1)){
                $del2="DELETE from cms_staff where staff_id='$sid'";
           if($result=mysqli_query($link,$del2)){
              $del3="DELETE from users where user_id='$sid'"; 
            if($result=mysqli_query($link,$del3)){
                echo "<p id='rem'>The staff has been successfully removed.</p>";
            }
           }
            }
       }
       else{
           echo "<p id='rem1'>Your request cannot be fulfilled!</p>";
       }
   }
}
mysqli_close($link);
?>  
    <div class="adds" id="adds1">  
    <form method="post" action="removestaff.php">
              <br />
        <div class="form-group">
              <input type="text" class="ut" name="staffid" placeholder="Enter staff-id" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["staffid"])) echo $_POST["staffid"];?>">
        </div> <br />
        <div class="form-group">
             <input type="text" class="ut" name="staffname" placeholder="Enter staff name"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["staffname"])) echo $_POST["staffname"];?>"> 
        </div>
     <br />
        <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="REMOVE" style="background-color:#17e9ae;">
    
        </form>
        </div>
    </body>
</html>