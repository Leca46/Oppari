<?php
/*
	file:	admin/updatepassword.php
	desc:	Checks that old password matches to database and new ones
			are ok. Updates database.
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['old'])) $oldpw=$_POST['old'];else $error=true;
if(!empty($_POST['new'])) $newpw=$_POST['new'];else $error=true;
if(!empty($_POST['conf'])) $confpw=$_POST['conf'];else $error=true;
if(!$error){
	//check from db
	session_start();
	$sql="SELECT password FROM user WHERE userID=".$_SESSION['userID'];
	$result=$conn->query($sql);
	if($result->num_rows>0){
		$row=$result->fetch_assoc();
		if(password_verify($oldpw,$row['password'])){
				if($newpw==$confpw){
					//update password
					//crypt the password before saving
					$newpw=password_hash($newpw,PASSWORD_DEFAULT);
					$sql="UPDATE user SET password='$newpw'
						  WHERE userID=".$_SESSION['userID'];
					$conn->query($sql);
					$_SESSION['msg']='Salasana päivitetty!';
				}else $_SESSION['msg']='Salasanasi eivät vastanneet toisiaan!';
		}else $_SESSION['msg']='Vanha salasana ei ollut oikea!';
	}else $_SESSION['msg']='Salasanaa ei löytynyt!';
}
header('location:index.php?page=chpwd');
?>
