<?php
session_start();
include_once("header.php");
?>
<div class="page-header">
							<h1>
								CART
							</h1>
						</div>
<?php
    $qry="Select * From tempcart";
$ch = mysqli_connect("localhost","root","","shopping_site");
$result = $ch->query($qry);
$sum=0;
$space="Bill  ";
$str="<table class='table  table-bordered table-hover'><tr><th>TId</th><th>ProductId</th><th>ProductName</th><th>Price</th><th>ProductImage</th><th>Quantity</th><th>Total</th><th>Remove From Cart</th></tr>";
while($row = $result->fetch_assoc())
{
$str.="<tr><td>".$row["tid"]."</td><td>".$row["pid"]."</td><td>".$row["pname"]."</td><td>".$row["price"]."<td><img src='photos\\".$row["pimg"]."' height='100' width='100'>"."</td><td>".$row["qty"]."</td><td>".$row["total"]."</td><td><a class='btn btn-xs btn-info' href='update.php?Id4=".$row["pname"]."'><i class='ace-icon fa fa-trash-o bigger-120'></i></a></td></tr>";
    $sum+=$row["total"];
}
$str.="<tr><td>".""."</td><td>".""."</td><td>".""."</td><td>".""."</td><td>".""."</td><td>"."BILL"."</td><td>"."$sum Rs"."</td></tr>";
$str.="</table>";
echo $str;
if(isset($_POST["btnsubmit"]))
{
    $id=$_SESSION["uid"];
    $qry="INSERT INTO orders(mid,doo) VALUES($id,NOW())";
    $ch = mysqli_connect("localhost","root","","shopping_site");
    $result = $ch->query($qry);
    
    $qry="Select max(oid) as Oid from orders";
    $ch = mysqli_connect("localhost","root","","shopping_site");
    $result = $ch->query($qry);
    $row1 = $result->fetch_assoc();
    $oid=$row1["Oid"];
    
    $qry1="SELECT * FROM tempcart";
    $ch1=mysqli_connect("localhost","root","","shopping_site");
    $result1 = $ch1->query($qry1);
    while($row1 = $result1->fetch_assoc())
    {
        $a=$row1["pid"];
        $b=$row1["pname"];
        $c=$row1["price"];
        $d=$row1["qty"];
        $e=$row1["total"];
        $qry="INSERT INTO order_detail(oid,pid,pname,price,qty,pq) VALUES($oid,$a,'$b',$c,$d,$e)";
        $ch = mysqli_connect("localhost","root","","shopping_site");
        $result = $ch->query($qry);
    }
    $qry1="DELETE FROM tempcart";
    $ch1=mysqli_connect("localhost","root","","shopping_site");
    $result1 = $ch1->query($qry1);
    
    $URL="history.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    
}
?>
<br><br>
<form method = "post">
                    <table border = "0">
                        <tr>
                        <input type = "submit" name = "btnsubmit" value = "BILL">
                        </tr>
    </table>
</form>
<?php
include_once("footer.php");
?>