<?php
/*
	file:	admin/edituserpass.php
	desc:	Form for editing user
*/
if(!empty($_GET['userID'])) $userID=$_GET['userID'];else header('location:index.php?page=users');
if(!empty($_GET['update'])) $update=$_GET['update'];else $update='';
include('../db.php');
$sql="SELECT * FROM user WHERE userID=$userID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
}

?>
		<title>Edit User password</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
	<script src="../js/jquery-3.2.1.min.js"></script>
<h3>Vaihda salasana käyttäjälle : <?php echo $row['level']?> <?php echo $row['firstName']?> <?php echo $row['lastName']?></h3>
<br>
<?php
if(!empty($update)) echo '<p class="alert alert-success">Updated!</p>';

?>
<div class ="well">
<table>
<form action="updateuserpass.php" method="post">
		<tr>
		<td><input type="hidden" name="userID" value="<?php echo $userID?>" /></td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>Anna uusi salasana: <br></td>
		<td><input type="password" name="newpassword" placeholder="Uusi salasana"></textarea><br /></td>
		<td></td>
		<td></td>
		</tr>
		<tr class = "empty">
		<td><br></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td>Anna uusi salasana uudelleen: <br> </td>
		<td><input type="password" name="confp"  placeholder="Vahvista uusi salasana"></textarea><br /></td>
		<td></td>
		<td></td>
		</tr>
		<tr>
			<tr class = "empty">
			<td><br></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
		<td></td>
		<td></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" value="Päivitä salasana" /></td>
		<td></td>
		<td></td>
		</tr>
</form>
</table>
</div>
