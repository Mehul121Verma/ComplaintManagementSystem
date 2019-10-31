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
 <nav role="navigation" class="navbar navbar-inverse">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" ><img src="imgs/staff1.png" class="logo1"></a>

                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                       <li><a href="viewprofile.php">View Profile</a></li>
                      <li><a href="managestatus.php">Manage Status</a></li>

                  </ul>
                  <a href="index.php" ><img src="imgs/power.png"  class="power"></a>
                  <div class="logout1"></div>
              </div>
          </div>
      </nav>
<div class="container">
              <h1><span id="he">Want to change your Password?</span></h1>
          </div>
        <div class="contact1">
      <div class="container">
        <a href="resetstaff.php" class="btn1" >RESET</a>
        </div>
        </div>
     <script>
    $(function(){
        $(".power").mouseover(function(){
            $(".logout1").html("<p>Logout</p>");
        });
    $(".power").mouseout(function(){
        $(".logout1").html("</p></p>");
                         });
    });
    </script>
</body>
</html>
