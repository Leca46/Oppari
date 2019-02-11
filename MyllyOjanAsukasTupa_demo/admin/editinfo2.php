<?php
/*
	file:	admin/editinfo2.php
	desc:	Form for editing department
*/
if(!empty($_GET['infoID2'])) $infoID2=$_GET['infoID2'];else header('location:index.php?page=info2');
if(!empty($_GET['update'])) $update=$_GET['update'];else $update='';
include('../db.php');
$sql="SELECT * FROM info2 WHERE infoID2=$infoID2";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
}

?>
		<title>Muokkaa Lähidemokratian tiedotteita</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
	<script src="../js/jquery-3.2.1.min.js"></script>
   	<link href="../css/signin.css" rel="stylesheet">
<h4>Muokkaa Lähidemokratian tiedotteita</h4>
<?php
if(!empty($update)) echo '<p class="alert alert-success">Updated!</p>';
?>
<div class ="well">
<table>
<form action="updateinfo2.php" method="post">
		<tr>
		<td></td>
		<td><input type="hidden" name="infoID2" value="<?php echo $infoID2?>" /></td>
		</tr>
		<tr>
		<td>Tiedotuksen nimi:</td>
		<td><input type="text" name="infoName2" placeholder="infoName2" value="<?php echo $row['infoName2']?>" /><br /></td>
		</tr>
		<tr>
		<td>Katuosoite:</td>
		<td><input type="text" name="street2" placeholder="street name2" value="<?php echo $row['street2']?>" /><br /></td>
		</tr>
		<tr>
		<td>postnr:</td>
		<td><input type="text" name="postnr2" placeholder="postnr2" value="<?php echo $row['postnr2']?>" /><br /></td>
		</tr>
		<tr>
		<td>Kaupunki:</td>
		<td><input type="text" name="city2" placeholder="city2" value="<?php echo $row['city2']?>" /><br /></td>
		</tr>
		<tr>
		<td>Linkki:</td>
		<td><input type="text" name="Website2" placeholder="Website2" value="<?php echo $row['Website2']?>" /><br /></td>
		</tr>
		<tr>
		<td>Lisätietoa:</td>
		<td><textarea name="infoDesc2" rows="5" cols="40" placeholder="infoDesc2"><?php echo $row['infoDesc2']?></textarea><br /></td>
		</tr>
		<tr>
		<td>Aika:</td>
		<td><input type="text" name="InfoTime2" placeholder="InfoTime2" value="<?php echo $row['InfoTime2']?>" /><br /></td>
		</tr>
		<tr>
		<td>Poista tieto</td>
		<td><input type="checkbox" name="removeinfo2" /><br /></td>
		</tr>
		<tr>
		<td>Päivitä:</td>
		<td><input type="submit" name="Update Info2" value="Päivitä" /></td>
		</tr>


</form>

</table>



</div>
