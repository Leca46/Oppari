<?php
/*
	file:	infoSearch.php
	desc:	Returns the list of companies as JSON
*/
header("Access-Control-Allow-Origin: * "); //all the UIs can access
if(!empty($_GET['search'])) $search=$_GET['search'].'%%';else $search='';
include('db.php');
$sql="SELECT * FROM info WHERE infoName LIKE '$search'";
$search = $conn->query($sql);
$output=array();
while($row=$search->fetch_assoc()){
	$output[]=$row;
}
if(!empty($search)) echo json_encode($output);
?>