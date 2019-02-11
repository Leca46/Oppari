<?php
/*
	file:	admin/users.php
	desc:	Displays the list of users in user-table
			Link to a form for adding a new user
			Edit and Delete -links
*/
if(!empty($_GET['mode'])) $mode=$_GET['mode'];else $mode='';
//variables used in pager: $start and $nr_of_records defined here
if(!empty($_GET['start'])) $start=$_GET['start'];else $start=0;
$nr_of_records=5;  //display 5 records at list on every page
//checkin, if on the firs page, start is always zero - even in previous
if($start==0) $prev=$start;else $prev=$start-$nr_of_records;
include('../db.php'); //use the database connection from parent folder
//check the number of records from database table person
$sql="SELECT count(*) as NrOfRecords FROM user";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$TotalRecords=$row['NrOfRecords'];
?>
		<title>Käyttäjä Tietokanta</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="js/myscript.js"></script>

		<div class="row" >
			<div class="col-xs">
				<div class="box">
<h4>Käyttäjät</h4>
<h5>* Vaaditaan!</h5>
<h6>Yksittäinen käyttäjä voidaan poistaa muokkaa sivun kautta.</h6>
        <a href="index.php?page=users&mode=add" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-plus"></span> Lisää käyttäjä
        </a>
<div class="table-responsive">

<?php
echo '<table class="table table-bordered"><tr><th>ID#</th><th>Email*</th><th>Salasana*</th>';
echo '<th>Etunimi*</th><th>Sukunimi*</th><th>Level*</th><th>Muokkaa</th><th>Muuta salasana</th></tr>';
//if mode in url is add, display a form as first line in table
if($mode=='add'){
	echo '<form action="insertuser.php" method="post" >
		  <tr>
			<td></td>
			<td><input type="email" name="email" /></td>
			<td><input type="text" name="password" /></td>
			<td><input type="text" name="firstName" /></td>
			<td><input type="text" name="lastName" /></td>
			<td><select name="level">

 <option value="">-Valitse taso-</option>

 <option value="admin">Admin</option>

 <option value="editor">Editor</option>

 </select></td>

			<td><input type="submit" Name="Add" value="Lisää" /></td>
		  </tr>
		  </form>';
}

$sql = "SELECT *
		FROM user
		ORDER BY lastname,firstname
		LIMIT $start,$nr_of_records";

$result=$conn->query($sql);  //runs the query in database
while($row=$result->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$row['userID'].'</td>';
	echo '<td>'.$row['email'].'</td>';
	echo '<td>*****</td>';
	echo '<td>'.$row['firstName'].'</td>';
	echo '<td>'.$row['lastName'].'</td>';
	echo '<td>'.$row['level'].'</td>';
	echo '<td><a href="index.php?page=edituser&userID='.$row['userID'].'"><span class="glyphicon glyphicon-edit">';
	echo '<td><a href="index.php?page=edituserpass&userID='.$row['userID'].'">Muuta salasana</a></td>';
	echo '</tr>';
}
echo '</table>';
$conn->close(); //close the connection - removed from server memory

?>

<ul class="pager">
<?php
	//check if in the first page
	if($start==0){
		echo '<li>Edellinen</li>';
	}else{
?>
  <li><a href="index.php?page=users&start=<?php echo $prev?>">Edellinen</a></li>
<?php
	}
	//check if already in the last page
	$lastrecordnow=$start+$nr_of_records;
	if($lastrecordnow<$TotalRecords){
?>
  <li><a href="index.php?page=users&start=<?php echo $start+$nr_of_records?>">Seuraava</a></li>
<?php
}else echo '<li>Seuraava</li>';
?>
 </ul>
	</div>
				</div>
			</div>
		</div>
