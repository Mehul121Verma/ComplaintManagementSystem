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
          #cp{
              color:#17e9ae;
          }
          #ne1{
              color:#17e9ae;
          }
         #ne{
              color:red;
          } 
    </style>
    </head>
    <body>
    <div id="contain">
    <div id="head">
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | CUSTOMER | VIEW STATUS<span class="back"><a href="cust1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br /><br />
      
    </div>    
    </div>
      <?php
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
    $val=$_COOKIE["cname"];
        echo "<p id='cp'>Name:".$val."</p>";
    $query="SELECT cust_id from customers where cust_name='$val'";
       if($result=mysqli_query($link,$query)){ 
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $value=$row["cust_id"];
         echo "<p id='cp'>Id:".$value."</p>";
    $sql="SELECT comp_id,comp_type,status from complaint where cust_id='$value'";
         if($rest=mysqli_query($link,$sql)){
           if(mysqli_num_rows($rest)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th>COMPLAINT ID</th>
               <th >COMPLAINT TYPE</th>
               <th>STATUS</th>
               </tr>
               ";
               while($row1=mysqli_fetch_array($rest,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td>".$row1["comp_id"]."</td>";
                   echo "<td>".$row1["comp_type"]."</td>";
                   echo "<td>".$row1["status"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
               mysqli_free_result($result);
           }
           }  
         }
         
         ?>
    </body>
</html>