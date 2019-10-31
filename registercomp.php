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
     #addpr{
            color:#17e9ae;
          transform:translate(542px,18px);   
        }
        #adder{
            color:red;
           transform:translate(550px,17px);  
        }
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | CUSTOMER | REGISTER COMPLAINT<span class="back"><a href="cust1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br />
        <h2 id="rep"><u>Report your issue :</u></h2>    
    </div>    
    </div>
     <?php
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
$pname = isset($_POST["pname"])?$_POST["pname"]:" ";
$ctype= isset($_POST["comptype"])?$_POST["comptype"]:" ";
        
    $val=$_COOKIE["cname"];    

//if the user has submitted the form
if(isset($_POST["submit"])){
    //check for errors
    if(!$pname || !$ctype){
        echo "<p id='adder'>You are required to fill all the entries!</p>";  
    }
   else
    {   
      $pname=mysqli_real_escape_string($link,$pname);
 $ctype=mysqli_real_escape_string($link,$ctype);
         $sql="INSERT into product(product_name) VALUES ('$pname')";
        if($result=mysqli_query($link,$sql)){
         $count="SELECT product_id from product order by product_id desc";
       if($res=mysqli_query($link,$count)){
           $rows=mysqli_fetch_array($res,MYSQLI_ASSOC);
           $c=$rows["product_id"];
         $query="SELECT cust_id from customers where cust_name='$val'";
       if($res1=mysqli_query($link,$query)){ 
        $row=mysqli_fetch_array($res1,MYSQLI_ASSOC);
        $value=$row["cust_id"];
       $sql1="INSERT into complaint(cust_id,product_id,status,comp_type) VALUES ('$value','$c','pending','$ctype')";
       if($res2=mysqli_query($link,$sql1)){
           echo "<p id=addpr>Your complaint has been registered!</p>";
       }
       }
        }
        }
    }
}
mysqli_close($link);
?>  
    <div class="adds" id="adds1">  
    <form method="post" action="registercomp.php">
              <br />
        <div class="form-group">
              <input type="text" class="ut" name="pname" placeholder="Product Name" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["pname"])) echo $_POST["pname"];?>">
        </div>  <br />
        <div class="form-group">
             <input type="text" class="ut" name="comptype" placeholder="Complaint Type"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["comptype"])) echo $_POST["comptype"];?>"> 
        </div>
     <br />
            <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="REPORT" style="background-color:#17e9ae;">
   
          </form>
    </div>
    
    </body>
</html>