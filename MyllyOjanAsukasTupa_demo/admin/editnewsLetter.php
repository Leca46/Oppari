<?php
/*
	file:	admin/editnewsLetter.php
	desc:	Form for editing newsLetter
*/
if(!empty($_GET['newsID'])) $newsID=$_GET['newsID'];else header('location:index.php?page=newsLetter');
if(!empty($_GET['update'])) $update=$_GET['update'];else $update='';
include('../db.php');
$sql="SELECT * FROM newsletter WHERE newsID=$newsID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
}

?>
		<title>Muokkaa asukastiedote julkaisua</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
	<script src="../js/jquery-3.2.1.min.js"></script>
   	<link href="../css/signin.css" rel="stylesheet">
<h4>Muokkaa asukastiedotetta</h4>
<?php
if(!empty($update)) echo '<p class="alert alert-success">Päivitys onnistui!</p>';
?>
<div class ="well">
<table>
<form action="updatenewsLetter.php" method="post">
		<tr>
		<td></td>
		<td><input type="hidden" name="newsID" value="<?php echo $newsID?>" /></td>
		</tr>
		<tr>
		<td>Tiedotuksen nimi:</td>
		<td><input type="text" name="newsName" placeholder="newsName" value="<?php echo $row['newsName']?>" /><br /></td>
		</tr>
		<tr>
		<td>Linkki:</td>
		<td><input type="text" name="newsLink" placeholder="newsLink" value="<?php echo $row['newsLink']?>" /><br /></td>
		</tr>
		<tr>
		<td>Poista tieto</td>
		<td><input type="checkbox" name="removenewsLetter" /><br /></td>
		</tr>
		<tr>
		<td>Päivitä:</td>
		<td><input type="submit" name="Update newsLetter" value="Päivitä" /></td>
		</tr>


</form>

</table>



</div>
