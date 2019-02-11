<?php
/*
	file:	admin/updateinfo.php
	desc:	Updates info data and only posting data is required else is marked false
*/
$error=false;
if(!empty($_POST['infoID'])) $infoID=$_POST['infoID'];else $error=true;
if(!empty($_POST['infoName'])) $infoName=$_POST['infoName'];else $error=true;
if(!empty($_POST['street'])) $street=$_POST['street'];else $error=true;
if(!empty($_POST['postnr'])) $postnr=$_POST['postnr'];else $error=true;
if(!empty($_POST['city'])) $city=$_POST['city'];else $error=true;
if(!empty($_POST['Website'])) $Website=$_POST['Website'];else $error=false;
if(!empty($_POST['infoDesc'])) $infoDesc=$_POST['infoDesc'];else $error=false;
if(!empty($_POST['InfoTime'])) $InfoTime=$_POST['InfoTime'];else $error=false;
if(!empty($_POST['removeinfo'])) $removeinfo=$_POST['removeinfo'];else $removeinfo='';
if(!$error){
	include('../db.php');
	$sql="UPDATE info SET infoName='$infoName',street='$street',postnr='$postnr',city='$city',Website='$Website',infoDesc='$infoDesc',InfoTime='$InfoTime' WHERE infoID=$infoID";
	$conn->query($sql);
	if(!empty($removeinfo)){
		$sql="DELETE FROM info WHERE infoID=$infoID";
		$conn->query($sql);
		if($conn->query($sql)===TRUE) header("location:index.php?page=info");
	}else   if($conn->query($sql)===TRUE) header("location:index.php?page=editinfo&infoID=$infoID&update=ok");
}else header('location:index.php');
?>
