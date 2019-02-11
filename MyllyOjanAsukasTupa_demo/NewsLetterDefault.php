<?php
/*
	file:	NewsLetterDefault.php
	desc:	Returns the list of newsletter's as JSON
*/
header("Access-Control-Allow-Origin: * "); //all the UIs can access
include('db.php');
$sql="SELECT * FROM newsletter ORDER BY newsName";
$result = $conn->query($sql);
$output=array();
while($row=$result->fetch_assoc()){
	$output[]=$row;
}
echo json_encode($output);
?>