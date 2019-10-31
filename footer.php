<style>
    .footer{
        position:absolute;
        bottom:0;
        width:100%;
       height:60px;
        background-color: #f3f1f1;
    }
    html{
        position:relative;
        min-height:100%;
    }
    body{
        margin-bottom:60px;
    }
    #foot{
        color:white;
    } 
</style>



<footer class="footer">
<div class="container">
<p class="text-muted" id="foot">
  <?php
 $today=date("d M,Y");   
echo $today;
<br />
$todayt=date("h:i:s A");
    echo $todayt;
?>
</p>  
</div>
</footer>