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
        <h5 id="add"><span class="add1">COMPLAINT ADDRESSAL PORTAL  ->  </span>HOME | STAFF | MANAGE STATUS<span class="back"><a href="staff1.php" class="link"><u>BACK</u></a></span></h5>
        
        <br /><br /><br />
      
    </div>    
    </div>
     <?php
$link=@mysqli_connect("localhost","root","","cms") or die("Error:Unable to connect: " . mysqli_connect_error());
    $val=$_COOKIE["uname"];
        echo "<p id='cp'>Name:".$val."</p>";
    $query="SELECT staff_id from cms_staff where staff_name='$val'";
       if($result=mysqli_query($link,$query)){ 
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $value=$row["staff_id"];
         echo "<p id='cp'>Id:".$value."</p>";
    $sql="SELECT b.comp_id,b.comp_type,a.cust_name,a.phone,a.mail,a.address,a.city,a.state,a.zip,b.status from complaint b,customers a where b.staff_id='$value' AND a.cust_id=b.cust_id";
         if($rest=mysqli_query($link,$sql)){
           if(mysqli_num_rows($rest)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th>COMPLAINT ID</th>
               <th >COMPLAINT TYPE</th>
                <th >CUSTOMER NAME</th>
                 <th >PHONE NUMBER</th>
                  <th >EMAIL ID</th>
                  <th >ADDRESS</th> 
                   <th >CITY</th> 
                    <th >STATE</th> 
                    <th >ZIP CODE</th>  
               <th>STATUS</th>
               </tr>
               ";
               while($row1=mysqli_fetch_array($rest,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td>".$row1["comp_id"]."</td>";
                   echo "<td>".$row1["comp_type"]."</td>";
                   echo "<td>".$row1["cust_name"]."</td>";
                     echo "<td>".$row1["phone"]."</td>";
                     echo "<td>".$row1["mail"]."</td>";
                     echo "<td>".$row1["address"]."</td>";
                     echo "<td>".$row1["city"]."</td>";
                     echo "<td>".$row1["state"]."</td>";
                     echo "<td>".$row1["zip"]."</td>";
                     echo "<td>".$row1["status"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
               mysqli_free_result($result);
              $cmpid=isset($_POST["compid"])?$_POST["compid"]:" ";
                if(isset($_POST["submit"])){
                    if(!$cmpid){
                        echo "<p id='ne'>Enter the complaint id!</p>";
                    }
                    else{
                       $cmpid=mysqli_real_escape_string($link,$cmpid); 
                        $q="UPDATE complaint set status='completed' where comp_id='$cmpid'";
                         if($rest=mysqli_query($link,$q)){
                             echo "<p id=ne1>Status updated successfully</p>";
                         }
                    }
                }
           }
           }  
         }
         
         ?>
         <div class="adds" id="adds1">  
    <form method="post" action="managestatus.php">
              <br />
         <div class="form-group">
             <input type="text" class="ut" name="compid" placeholder="Enter complaint-id" size="30px" maxlength="100" class="form-control" value="<?php if(isset($_POST["compid"])) echo $_POST["compid"];?>"></div>
         <br />
                 <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="UPDATE STATUS" style="background-color:#17e9ae;">
             </form>
        </div>
    </body>
</html>