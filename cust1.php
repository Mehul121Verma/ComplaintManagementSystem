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
    </head>
<body>
 <nav role="navigation" class="navbar navbar-inverse">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" ><img src="imgs/user.png" class="logo"></a>
                  
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                       <li><a href="viewprofilecust.php">View Profile</a></li>
                      <li><a href="registercomp.php">Register Complaint</a></li>
                      <li><a href="viewstatus.php">View Status</a></li>
                      
                  </ul>
                  <a href="index.php" ><img src="imgs/power.png"  class="power"></a>
                  <div class="logout3"></div>
              </div>
          </div>
      </nav>   
<div class="container">
              <h1><span id="he">Want to change your Password?</span></h1>
          </div>
        <div class="contact1">
      <div class="container">
        <a href="resetcust.php" class="btn1" >RESET</a>
        </div>  
        </div> 
     <script>
    $(function(){
        $(".power").mouseover(function(){
            $(".logout3").html("<p id='log'>Logout</p>");
        });
    $(".power").mouseout(function(){
        $(".logout3").html("</p></p>");
                         });
    });
    </script>
</body>
</html>