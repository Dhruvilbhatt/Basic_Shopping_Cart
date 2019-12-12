<?php
session_start();
include_once("header.php");
?>

<?php
$str="";

$un=$_SESSION["uname"];
if($_SESSION["flag"]==0)
{
    
    $str="MEMBER $un";
    
}

else
{
    $str="ADMIN $un";
   
}
?>
<div class="page-header">
							<h1 style= "text-align:center;color:red;font-size:50px">
							 WELCOME, <?php echo $str; ?>
							</h1>
</div>


<p style = "text-align:center;"><img src="Photos/NEWW.jpeg" height = '500' width="900"></p>

<?php
include_once("footer.php");
?>
  