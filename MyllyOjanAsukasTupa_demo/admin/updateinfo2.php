<?php
/*
	file:	admin/updateinfo2.php
	desc:	Updates info data and only posting data is required else is marked false
*/
$error=false;
if(!empty($_POST['infoID2'])) $infoID2=$_POST['infoID2'];else $error=true;
if(!empty($_POST['infoName2'])) $infoName2=$_POST['infoName2'];else $error=true;
if(!empty($_POST['street2'])) $street2=$_POST['street2'];else $error=true;
if(!empty($_POST['postnr2'])) $postnr2=$_POST['postnr2'];else $error=true;
if(!empty($_POST['city2'])) $city2=$_POST['city2'];else $error=true;
if(!empty($_POST['Website2'])) $Website2=$_POST['Website2'];else $error=false;
if(!empty($_POST['infoDesc2'])) $infoDesc2=$_POST['infoDesc2'];else $error=false;
if(!empty($_POST['InfoTime2'])) $InfoTime2=$_POST['InfoTime2'];else $error=false;
if(!empty($_POST['removeinfo2'])) $removeinfo2=$_POST['removeinfo2'];else $removeinfo2='';
if(!$error){
	include('../db.php');
	$sql="UPDATE info2 SET infoName2='$infoName2',street2='$street2',postnr2='$postnr2',city2='$city2',Website2='$Website2',infoDesc2='$infoDesc2',InfoTime2='$InfoTime2' WHERE infoID2=$infoID2";
	$conn->query($sql);
	if(!empty($removeinfo2)){
		$sql="DELETE FROM info2 WHERE infoID2=$infoID2";
		$conn->query($sql);
		if($conn->query($sql)===TRUE) header("location:index.php?page=info2");
	}else   if($conn->query($sql)===TRUE) header("location:index.php?page=editinfo2&infoID2=$infoID2&update=ok");
}else header('location:index.php');
?>
