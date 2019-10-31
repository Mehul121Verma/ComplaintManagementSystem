<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>COMPLAINT MANAGEMENT PORTAL</title>
    <link href="./styling.css" rel="stylesheet">
     <link href="./bootstrap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <script src="./jquery-3.3.1.min.js"></script>
    </head>
<body>
     <div class="container">
              <h1><span id="he">COMPLAINT  ADDRESSAL  PORTAL</span></h1>
          </div>
    <br />
    <br />
    <div class="image1" id="image">
     <img src="./signup.png" class="bodyimage1">
    </div>


<?php
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
$name = isset($_POST["name"])?$_POST["name"]:" ";
$password = isset($_POST["pass"])?$_POST["pass"]:" ";
$l=strlen($password);
$repassword = isset($_POST["pass1"])?$_POST["pass1"]:" ";

//error messages
$missingName = '<p id="err"><strong>Please enter your name!</strong></p>';
$missingPassword = '<p id="err"><strong>Please enter your password!</strong></p>';
$invalidPassword = '<p id="err"><strong>Please enter a valid password!</strong></p>';
$missingPassCon = '<p id="err"><strong>Please confirm your password!</strong></p>';
$notMatch = '<p id="err"><strong>The password does not match!</strong></p>';
    $lenerr = '<p id="err"><strong>The password is too small!</strong></p>';
    $invalidformat = '<p id="err"><strong>The password does not match the required format!</strong></p>';
//if the user has submitted the form
if(isset($_POST["submit"])){
    //check for errors
    if(!$name){
        $errors .= $missingName;
    }else{
        $name = filter_var($name,FILTER_SANITIZE_STRING);
    }
    if(!$password){
        $errors .= $missingPassword;
    }
    else{
     if($l<8)
     {
         $errors .=$lenerr;
     }
    if(!preg_match("/^[a-z]+[0-9]+/",$password)){
        $errors .=$invalidformat;
    }
    }
    if(!$repassword){
        $errors .= $missingPassCon;
    }
    if($repassword!=$password){
        $errors .= $notMatch;
    }

        //if there are any errors
    if($errors){
        //print error message
        $resultMessage = '<div class="alert alert-danger image1" id="msgy">' . $errors .'</div>';
        echo $resultMessage;
    }
    else{
         setcookie ("name",$name,time()+6700);
           setcookie ("pass",$password,time()+6700);
        $sql="INSERT into users(user_name) VALUES('$name')";
        if($result=mysqli_query($link,$sql)){
       header("Location:details.php");
       exit();
        }

    }
}
?>

      <div class="sign1" id="sign2">
    <form action="signup.php" method="post">
        <div class="form-group">
      <input type="text" class="ut" name="name" placeholder="Enter username" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>"></div> <br />
        <div class="form-group">
              <input type="password" class="ut" name="pass" id="pass1" placeholder="Enter password" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["pass"])) echo $_POST["pass"];?>"></div>
     <img src="imgs/ques1.png" class="bodyimagex">
     <div class="msg1"></div>
        <div class="form-group">
             <input type="password" class="ut" name="pass1" id="pass2" placeholder="Re-enter password"  size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["pass1"])) echo $_POST["pass1"];?>"></div>
        <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="SIGN UP" style="background-color:#17e9ae;">

          </form>
    </div>
    <script>
    $(function(){
        $(".bodyimagex").mouseover(function(){
            $(".msg1").html("<p>Password should be atleast 8 characters long,should begin with a lowercase alphabet and should contain atleast one digit</p>");
        });
        $(".bodyimagex").mouseout(function(){
            $(".msg1").html("<p></p>");
        });
    });

    </script>
    </body>
    <script>

    </script>
</html>
<?php
ob_flush();
?>
