<?php
/*
	file:	admin/updatenewsLetter.php
	desc:	Updates newsletter data and only posting data is required else is marked false
*/
$error=false;
if(!empty($_POST['newsID'])) $newsID=$_POST['newsID'];else $error=true;
if(!empty($_POST['newsName'])) $newsName=$_POST['newsName'];else $error=true;
if(!empty($_POST['newsLink'])) $newsLink=$_POST['newsLink'];else $error=true;
if(!empty($_POST['removenewsLetter'])) $removenewsLetter=$_POST['removenewsLetter'];else $removenewsLetter='';
if(!$error){
	include('../db.php');
	$sql="UPDATE newsletter SET newsName='$newsName',newsLink='$newsLink' WHERE newsID=$newsID";
	$conn->query($sql);
	if(!empty($removenewsLetter)){
		$sql="DELETE FROM newsletter WHERE newsID=$newsID";
		$conn->query($sql);
		if($conn->query($sql)===TRUE) header("location:index.php?page=newsLetter");
	}else   if($conn->query($sql)===TRUE) header("location:index.php?page=editnewsLetter&newsID=$newsID&update=ok");
}else header('location:index.php');
?>
