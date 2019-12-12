<?php
session_start();
include_once("header.php");
?>
<div class="page-header">
							<h1>
								Selected Items
							</h1>
						</div>
<?php

$id=$_GET["Id1"];
$qry="Select * From product WHERE pname = '$id'";
$ch = mysqli_connect("localhost","root","","shopping_site");
$result = $ch->query($qry);

$str="<table class='table  table-bordered table-hover'><tr><th>ProductId</th><th>ProductName</th><th>Price</th><th>ProductImage</th><th>Company</th></tr>";
while($row = $result->fetch_assoc())
{
$str.="<tr><td>".$row["pid"]."</td><td>".$row["pname"]."</td><td>".$row["price"]."</td>"."<td><img src='photos\\".$row["pimg"]."' height='100' width='100'>"."</td><td>".$row["company"]."</td></tr>";
}

$str.="</table>";
echo $str;

if(isset($_POST["btnSubmit"]))
    {
        $result = $ch->query($qry);
        $row1 = $result->fetch_assoc();
       
        $a= $row1["pid"];
        $b= $row1["pname"];
    $c= $row1["price"];
    $d= $row1["pimg"];
    $e= $_POST["cmbop"];
    
    $qry1="INSERT INTO tempcart(pid,pname,price,pimg,qty,total) VALUES($a,'$b',$c,'$d',$e,$c*$e)";
    $ch = mysqli_connect("localhost","root","","shopping_site");
    $result1 = $ch->query($qry1);
        
        //header("Location:Bill.php");
    $URL="Bill.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    
        
    }
?>
<form method = "post">
                    <table border = "0">
                    <tr>
                    <td colspan="1">Select Qty:</td>
                        <td>
                    <select name = "cmbop">
                        <option value= "1" >1</option>
                        <option value= "2" >2</option>
                        <option value= "3" >3</option>
                        <option value= "4" >4</option>
                        <option value= "5" >5</option>
                        <option value= "6" >6</option>
                        <option value= "7" >7</option>
                        <option value= "8" >8</option>
                    </select>
                            </td>
                </tr>
                        <tr>
                            <td> </td>
                        </tr>
                    <tr>
                        <td colspan="1"> </td>
                    <td><input type = "submit" value ="Submit" name="btnSubmit"></td>
                </tr>
                    </table>
    </form>
    
    <?php
include_once("footer.php");
?>
   