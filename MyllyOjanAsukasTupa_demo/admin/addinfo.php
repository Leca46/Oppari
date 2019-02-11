<?php
/*
	file:	admin/addinfo.php
	desc:	Reads event data from POST and if it is ok, saves into db
	Must have fields: You have to put data in infoName, infoDesc. If not it is error.
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['infoName'])) $infoName=$_POST['infoName'];else $error=true;
if(!empty($_POST['street'])) $street=$_POST['street'];else $error=false;
if(!empty($_POST['postnr'])) $postnr=$_POST['postnr'];else $error=false;
if(!empty($_POST['city'])) $city=$_POST['city'];else $error=false;
if(!empty($_POST['Website'])) $Website=$_POST['Website'];else $error=false;
if(!empty($_POST['infoDesc'])) $infoDesc=$_POST['infoDesc'];else $error=true;
if(!empty($_POST['InfoTime'])) $InfoTime=$_POST['InfoTime'];else $error=false;

if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT * FROM info WHERE infoName='$infoName'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=info');
	}else{
	 //insert into database. Both into story
	 $sql="INSERT INTO info(infoName,street,postnr,city,Website,infoDesc,InfoTime)
	 VALUES('$infoName','$street','$postnr','$city','$Website','$infoDesc','$InfoTime')";
	 $conn->query($sql);
	  //get the id of inserted record from auto-increment
	 $last_id=$conn->insert_id;
	 $conn->close();
	}
}
header('location:index.php?page=info');
?>
