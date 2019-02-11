<?php
/*
	file:	admin/addinfo2.php
	desc:	Reads lähidemokratia data from POST and if it is ok, saves into db
	Must have fields: You have to put data in infoName, infoDesc. If not it is error.
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['infoName2'])) $infoName2=$_POST['infoName2'];else $error=true;
if(!empty($_POST['street2'])) $street2=$_POST['street2'];else $error=false;
if(!empty($_POST['postnr2'])) $postnr2=$_POST['postnr2'];else $error=false;
if(!empty($_POST['city2'])) $city2=$_POST['city2'];else $error=false;
if(!empty($_POST['Website2'])) $Website2=$_POST['Website2'];else $error=false;
if(!empty($_POST['infoDesc2'])) $infoDesc2=$_POST['infoDesc2'];else $error=true;
if(!empty($_POST['InfoTime2'])) $InfoTime2=$_POST['InfoTime2'];else $error=false;

if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT * FROM info2 WHERE infoName2='$infoName2'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=info2');
	}else{
	 //insert into database. Both into story
	 $sql="INSERT INTO info2(infoName2,street2,postnr2,city2,Website2,infoDesc2,InfoTime2)
	 VALUES('$infoName2','$street2','$postnr2','$city2','$Website2','$infoDesc2','$InfoTime2')";
	 $conn->query($sql);
	  //get the id of inserted record from auto-increment
	 $last_id=$conn->insert_id;
	 $conn->close();
	}
}
header('location:index.php?page=info2');
?>
