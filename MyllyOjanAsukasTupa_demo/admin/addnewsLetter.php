<?php
/*
	file:	admin/addnewsLetter.php
	desc:	Reads newsletter data from POST and if it is ok, saves into db
	Must have fields: You have to put data in newsName, newsLink. If not it is error.
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['newsName'])) $newsName=$_POST['newsName'];else $error=true;
if(!empty($_POST['newsLink'])) $newsLink=$_POST['newsLink'];else $error=true;
if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT * FROM newsletter WHERE newsName='$newsName'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=newsLetter');
	}else{
	 //insert into database. Both into story
	 $sql="INSERT INTO newsletter(newsName,newsLink)
	 VALUES('$newsName','$newsLink')";
	 $conn->query($sql);
	  //get the id of inserted record from auto-increment
	 $last_id=$conn->insert_id;
	 $conn->close();
	}
}
header('location:index.php?page=newsLetter');
?>
