<?php
/*
	file:	admin/insertuser.php
	desc:	Reads form fields coming lastname, firstname, email
			and level. Inserts them into table users in db
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['email'])) $email=$_POST['email'];else $error=true;
if(!empty($_POST['password'])) $password=$_POST['password'];else $error=true;
if(!empty($_POST['firstName'])) $firstName=$_POST['firstName'];else $error=true;
if(!empty($_POST['lastName'])) $lastName=$_POST['lastName'];else $error=true;
if(!empty($_POST['level'])) $level=$_POST['level'];else $level=0;
if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT * FROM user WHERE email='$email'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=users');
	}else{
	 //insert into database. Into user table.
	 $password=password_hash($password,PASSWORD_DEFAULT);
	 $sql="INSERT INTO user(email,password,firstName,lastName,level)
		 VALUES('$email','$password','$firstName','$lastName','$level')";
	 $conn->query($sql);
	 //get the id of inserted record from auto-increment
	 $last_id=$conn->insert_id;

	}
}
$conn->close();
header('location:index.php?page=users');
?>
