<!--
<?php
include_once("header.php");
?>
-->
<div class="page-header">
							<h1 style= "text-align:center;color:blue;font-size:30px">
							 SIGN UP
							</h1>
						</div>
<?php
$a="";
$b="";
$c="";
$d="";
$e="";
$f="";
$g="";
$h="";

if(isset($_POST["btnsubmit"]))
{
    $a=$_POST["txtus"];
    $b=$_POST["txtpw"];
    $c=$_POST["txtfn"];
    $d=$_POST["txtln"];
    $e=$_POST["txtco"];
    $f=$_POST["txtem"];
    $g=$_POST["txtdj"];
    $h=$_POST["admin"];
    $qry="INSERT INTO member(uname,pwd,fname,lname,contactno,email,doj,isadmin) VALUES('$a','$b','$c','$d','$e','$f','$g','$h')";
    $ch = mysqli_connect("localhost","root","","shopping_site");
    $result = $ch->query($qry);
    $URL="Categories.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    
}



?>


<form method = "post">
<table border="0">
    <tr>
        <td colspan="2">USERNAME: </td>
        <td> <input type = "text" name = "txtus"></td>
    </tr>
    <tr>
        <td colspan="2">PASSWORD: </td>
        <td> <input type = "text" name = "txtpw"></td>
    </tr>
    <tr>
        <td colspan="2">FIRST NAME: </td>
        <td> <input type = "text" name = "txtfn"></td>
    </tr>
    <tr>
        <td colspan="2">LAST NAME: </td>
        <td> <input type = "text" name = "txtln"></td>
    </tr>
    <tr>
        <td colspan="2">CONTACT NO: </td>
        <td> <input type = "text" name = "txtco"></td>
    </tr>
    <tr>
        <td colspan="2">EMAIL: </td>
        <td> <input type = "text" name = "txtem"></td>
    </tr>
    <tr>
        <td colspan="2">DATE OF JOIN: </td>
        <td> <input type = "text" name = "txtdj"></td>
    </tr>
    <tr>
        <td colspan="2"> ARE YOU ADMIN? </td>
        <td>
                    <select name = "admin">
                        <option value= "true" >YES</option>
                        <option value= "false">NO</option>
                    </select>
            </td>
                </tr>
    
    <tr>
        <td colspan="2"> </td>
        <td> <input type = "submit" name = "btnsubmit" value="SIGN IN"></td>
    </tr>
    </table>

</form>
<!--
<?php
include_once("footer.php");
?>-->
