<?php
session_start();
include_once("header.php");
?>
<div class="page-header">
							<h1>
								Products
							</h1>
						</div>
<div class="row">
									<div class="col-xs-6 col-sm-3 pricing-box">

<?php

$id=$_GET["Id"];

$qry = "SELECT catname,pname,price,pimg FROM category,product WHERE category.catid = product.catid and category.catid=$id";
$ch = mysqli_connect("localhost","root","","shopping_site");
$result = $ch->query($qry);

$str="<div class='widget-box widget-color-dark'>
											<div class='widget-header'>";
$x=1;
while($row = $result->fetch_assoc())
{
if($x<=3)
{
$str.="<div class='widget-body'>
												<div class='widget-main'>
											<a href='AddtoCart.php?Id1=".$row["pname"]."'>".$row["pname"]."    ".$row["price"]."<Br><img src='photos\\".$row["pimg"]."' height='100' width='100'></td>";
    $x++;
}
    else
    {   
        $str.="<tr></tr>";
    $str.="</div>";
        $str.="<td><a href='AddtoCart.php?Id1=".$row["pname"]."'>".$row["pname"]."    ".$row["price"]."<Br><img src='photos\\".$row["pimg"]."' height='100' width='100'></td>";
    $x=1;    
    }
    
}
$str.="</div></div>";
echo $str;

?>



<?php
include_once("footer.php");
?>