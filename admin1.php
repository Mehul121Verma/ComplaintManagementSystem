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
                  <a class="navbar-brand" ><img src="imgs/king.png" class="logo"></a>

                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                       <li><a href="viewstaff.php">View Staff Details</a></li>
                      <li><a href="complog.php">Complaint Logs</a></li>
                      <li><a href="assign.php">Manage Complaint</a></li>
                      <li><a href="addst.php">Add Staff</a></li>
                      <li><a href="removestaff.php">Remove Staff</a></li>
                  </ul>
                  <a href="index.php" ><img src="imgs/power.png"  class="power"></a>
                  <div class="logout"></div>
              </div>
          </div>
      </nav>
<div class="container">
              <h1><span id="he">Want to change your Password?</span></h1>
          </div>
        <div class="contact1">
      <div class="container">
        <a href="resetadmin.php" class="btn1" >RESET</a>
        </div>
        </div>
    <script>
    $(function(){
        $(".power").mouseover(function(){
            $(".logout").html("<p>Logout</p>");
        });
    $(".power").mouseout(function(){
        $(".logout").html("</p></p>");
                         });
    });
    </script>
    <div class="dt">
    <?php

    ?>
    </div>
</body>
</html>
