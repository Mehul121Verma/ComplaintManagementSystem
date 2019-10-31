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
        .tabl{
            color:white;
        }
        .tabl:hover{
            color:#17e9ae;;
        }
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | ADMIN | COMPLAINT LOGS<span class="back"><a href="admin1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br />
        </div>
        </div>
          <?php
$link=mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
    $sql="SELECT comp_id,staff_id,status,comp_type from complaint";
         if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th>COMPLAINT_ID</th>
               <th >STAFF_ID</th>
               <th>STATUS</th>
               <th >COMPLAINT_TYPE</th>
               </tr>
               ";
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td>".$row["comp_id"]."</td>";
                   echo "<td>".$row["staff_id"]."</td>";
                   echo "<td>".$row["status"]."</td>";
                   echo "<td>".$row["comp_type"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
               mysqli_free_result($result);
           }  
         }
         
         ?>
    </body>
</html>