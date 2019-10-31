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
    <script src="js/jquery-3.3.1.min.js"></script>
    <style>
        #q1{
            color:red;
            transform:translate(550px,17px);
        }
     #q2{
            color:red;
         transform:translate(550px,17.5px);
        }
       #q3{
            color:red;
            transform:translate(550px,18px);
        }  
         #q4{
            color:red;
               transform:translate(550px,18.5px);
        }
         #q5{
            color:#17e9ae;
              transform:translate(550px,17px); 
        }
        
    </style>
    </head>
    <body>
    <div class="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | STAFF | RESET PASSWORD<span class="back"><a href="staff1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br />
       <h2 id="add4"><u>Enter your password details :</u></h2>    
    </div>
    </div>
     <?php
        $var=$_COOKIE["staffpass"];
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
$name = isset($_POST["name"])?$_POST["name"]:" ";
$password = isset($_POST["pass"])?$_POST["pass"]:" ";
$repassword = isset($_POST["pass1"])?$_POST["pass1"]:" ";
$x=0;
//if the user has submitted the form
if(isset($_POST["submit"])){
    //check for errors
    if(!$name){
        echo "<p id=q1>Please enter your current password!</p>";
        $x=1;
    }else{
        $name = filter_var($name,FILTER_SANITIZE_STRING);   
    }
    if($var!=$name)
    {
        echo "<p id=q1>Invalid current password!</p>";
        $x=1;
    }
    if(!$password){
          echo "<p id=q2>Please enter your new password!</p>";
        $x=1;
    }
    else{
    
    if(!preg_match("/^[a-zA-Z]\w{7,19}$/",$password)){
          echo "<p id=q3>Invalid format!</p>";
        $x=1;
    }
    }
    if(!$repassword){
        echo "<p id=q4>Please confirm your password!</p>";
        $x=1;
    }
    else if($repassword!=$password){
       echo "<p id=q4>The password does not match!</p>";
        $x=1;
    }
    if($x==0)
    {   
         $name=mysqli_real_escape_string($link,$name);
        $password=mysqli_real_escape_string($link,$password);
         $sql="UPDATE cms_staff SET password='$password' where password='$name'";
        if($result=mysqli_query($link,$sql)){
            echo "<p id=q5>Your password has been reset</p>";
             }
    }
}
mysqli_close($link);
?>
    <div class="adds" id="adds1">  
    <form action="resetstaff.php" method="post">
     <br /> 
        <div class="form-group">
            <input type="password" class="ut" id="currentpassadmin" name="name" placeholder="Enter current password" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>"></div>
         <br />
        <div class="form-group">
            <input type="password" class="ut" name="pass" id="newpassadmin" placeholder="Enter new password"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["pass"])) echo $_POST["pass"];?>"> </div>
    <img src="imgs/ques1.png" class="bodyimagey">
     <div class="msg2"></div>
    <div class="form-group">
        <input type="password" class="ut" name="pass1" id="confirmpassadmin" placeholder="Re-enter new password"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["pass1"])) echo $_POST["pass1"];?>"></div>  <br />
        <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="RESET" style="background-color:#17e9ae;">
   
          </form>
    </div>
        
     <script>
    $(function(){
        $(".bodyimagey").mouseover(function(){
            $(".msg2").html("Password should be minimum 8 characters long and the first character must be a letter and no characters other than letters and number should be used.");
        });
        $(".bodyimagey").mouseout(function(){
            $(".msg2").html("<p></p>");
        });
    });
    
    </script>
    </body>
</html>
<?php
ob_flush();
?>