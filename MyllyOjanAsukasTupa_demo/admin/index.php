<?php
/*
	file:	admin/index.php
	desc:	Display the admin page if user is logged in
			checks that user is logged in and prevents
			the page to be  saved any cache, proxy etc
*/
if(!empty($_GET['page'])) $page=$_GET['page'];else $page='';
session_start();
if(!isset($_SESSION['userID'])) header('location:../index.html');
header('Cache-control:no-store,no-cache,must-revalidate');
include('../db.php');
$sql="SELECT level FROM user WHERE userID=".$_SESSION['userID'];
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	$level=$row['level'];
}else header('location:../index.html');

?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Käyttäjä Tietokanta</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!--jQuery-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="js/myscript.js"></script>


	</head>
	<body>


		 <div class="panel panel-default container">
	     <h3>Asukastuvan - Hallintapaneeli</h3>
		  <p>
			<a href="index.php">Etusivu</a>
			<a href="index.php?page=info">Tapahtumat</a>
			<a href="index.php?page=info2">Lähidemokratia</a>
			<a href="index.php?page=newsLetter">Asukastiedote</a>
			<?php if($level=='admin')echo '<a href="index.php?page=users">Käyttäjät</a>';?>
			<a href="index.php?page=chpwd"><?php echo $_SESSION['name']?></a>
			<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Kirjaudu ulos</a></span>

		  </p>
		 </div>

	<section  class="container " >
		<?php
			if($page=='') echo '<h2>Tervetuloa hallintapanelin sivulle</h2><p>Tämä sivusto on admineille ja editoreille.</p>';
			if($page=='chpwd') include('changepassword.php');
			if($level=='admin'&&$page=='users') include('users.php');
			if($page=='info') include('info.php');
			if($page=='addinfo') include('addinfo.php');
			if($page=='editinfo') include('editinfo.php');
			if($page=='info2') include('info2.php');
			if($page=='addinfo2') include('addinfo2.php');
			if($page=='editinfo2') include('editinfo2.php');
			if($page=='newsLetter') include('newsLetter.php');
			if($page=='addnewsLetter') include('addnewsLetter.php');
			if($page=='editnewsLetter') include('editnewsLetter.php');

			if($level=='admin'&&$page=='edituser') include('edituser.php');
			if($level=='admin'&&$page=='edituserpass') include('edituserpass.php');
			if($level=='admin'&&$page=='updateuserpass') include('updateuserpass.php');

			if($level=='admin'&&$page=='removeuser') include('removeuser.php');
			if($level=='admin'&&$page=='insertuser') include('insertuser.php');

			if($level=='admin'&&$page=='deleteuser') include('deleteuser.php');
			if($level=='admin'&&$page=='updateuser') include('updateuser.php');
		?>

		</section>

	 <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>



    <!-- Custom scripts for this template -->



  	</body>
</html>
