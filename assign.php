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
     #errp{
            color:red;
            transform:translate(550px,17px);
        }
       #q5{
            color:#17e9ae;
              transform:translate(515px,17px); 
        }
         
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | ADMIN | MANAGE COMPLAINT<span class="back"><a href="admin1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br />
        <h2 id="add3"><u>Assign Complaint to the CMS Staff:</u></h2>    
    </div>    
    </div>
       <?php $link=@mysqli_connect("localhost","root","","cms") or die("Erro:Unable to connect: " . mysqli_connect_error());
    $cid = isset($_POST["compid"])?$_POST["compid"]:" ";
    $sid=isset($_POST["staffid1"])?$_POST["staffid1"]:" ";
    if(isset($_POST["submit"])){
    if(!$cid || !$sid)
    {
         echo "<p id='errp'>You are required to fill all the entries!</p>";
    }
        else{
           $cid=mysqli_real_escape_string($link,$cid);
        $sid=mysqli_real_escape_string($link,$sid);
        $sql="UPDATE complaint set status='processing',staff_id='$sid' where comp_id='$cid'";
        if($result=mysqli_query($link,$sql)){
            echo "<p id=q5>The complaint has been assigned successfully.</p>";
        }
        }
    }
    ?>
    <div class="adds" id="adds1">  
    <form method="post" action="assign.php">
              <br />
         <div class="form-group">
             <input type="text" class="ut" name="compid" placeholder="Enter complaint-id" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["compid"])) echo $_POST["compid"];?>"></div>
         <br />
         <div class="form-group">
             <input type="text" class="ut" name="staffid1" placeholder="Enter staff-id"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["staffid1"])) echo $_POST["staffid1"];?>"> 
        </div>
     <br />
            
         <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="ASSIGN" style="background-color:#17e9ae;">
    
          </form>
    </div>
    
    </body>
</html>