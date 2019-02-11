<?php
/*
	file:	admin/editinfo.php
	desc:	Form for editing department
*/
if(!empty($_GET['infoID'])) $infoID=$_GET['infoID'];else header('location:index.php?page=info');
if(!empty($_GET['update'])) $update=$_GET['update'];else $update='';
include('../db.php');
$sql="SELECT * FROM info WHERE infoID=$infoID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
}

?>
		<title>Muokkaa tapahtumaa</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
	<script src="../js/jquery-3.2.1.min.js"></script>
   	<link href="../css/signin.css" rel="stylesheet">
<h4>Muokkaa tapahtumaa</h4>
<?php
if(!empty($update)) echo '<p class="alert alert-success">Updated!</p>';
?>
<div class ="well">
<table>
<form action="updateinfo.php" method="post">
		<tr>
		<td></td>
		<td><input type="hidden" name="infoID" value="<?php echo $infoID?>" /></td>
		</tr>
		<tr>
		<td>Tapahtuman nimi:</td>
		<td><input type="text" name="infoName" placeholder="infoName" value="<?php echo $row['infoName']?>" /><br /></td>
		</tr>
		<tr>
		<td>Katuosoite:</td>
		<td><input type="text" name="street" placeholder="street name" value="<?php echo $row['street']?>" /><br /></td>
		</tr>
		<tr>
		<td>postnr:</td>
		<td><input type="text" name="postnr" placeholder="postnr" value="<?php echo $row['postnr']?>" /><br /></td>
		</tr>
		<tr>
		<td>Kaupunki:</td>
		<td><input type="text" name="city" placeholder="city" value="<?php echo $row['city']?>" /><br /></td>
		</tr>
		<tr>
		<td>Linkki:</td>
		<td><input type="text" name="Website" placeholder="Website" value="<?php echo $row['Website']?>" /><br /></td>
		</tr>
		<tr>
		<td>Lisätietoa:</td>
		<td><textarea name="infoDesc" rows="5" cols="40" placeholder="infoDesc"><?php echo $row['infoDesc']?></textarea><br /></td>
		</tr>
		<tr>
		<td>Aika:</td>
		<td><input type="text" name="InfoTime" placeholder="InfoTime" value="<?php echo $row['InfoTime']?>" /><br /></td>
		</tr>
		<tr>
		<td>Poista tieto</td>
		<td><input type="checkbox" name="removeinfo" /><br /></td>
		</tr>
		<tr>
		<td>Päivitä:</td>
		<td><input type="submit" name="Update Info" value="Päivitä" /></td>
		</tr>


</form>

</table>



</div>
