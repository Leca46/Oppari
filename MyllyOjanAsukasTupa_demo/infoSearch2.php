<?php
/*
	file:	infoSearch2.php
	desc:	Returns the list of companies as JSON
*/
header("Access-Control-Allow-Origin: * "); //all the UIs can access
if(!empty($_GET['search2'])) $search2=$_GET['search2'].'%%';else $search2='';
include('db.php');
$sql="SELECT * FROM info2 WHERE infoName2 LIKE '$search'";
$search = $conn->query($sql);
$output=array();
while($row=$search->fetch_assoc()){
	$output[]=$row;
}
if(!empty($search)) echo json_encode($output);
?>
