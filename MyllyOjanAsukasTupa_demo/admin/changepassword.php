<?php
/*
	file:	admin/changepassword.php
	desc:	Displays the form for logged in user to change password
*/
?>
<h4>Muuta salasanasi</h4>
<div class="well">
<form action="updatepassword.php" method="post">
 <table class="table">
	<tr><td>Vanha salasana</td><td><input type="password" name="old" /></td></tr>
	<tr><td>Uusi salasana</td><td><input type="password" name="new" /></td></tr>
	<tr><td>Toista uusi salasana</td><td><input type="password" name="conf" /></td></tr>
	<tr><td></td><td><input type="submit" name="Change password" value="Muuta salasana" /></td></tr>
 </table>
</form>
<p>
<?php
if(isset($_SESSION['msg'])) echo $_SESSION['msg'];
$_SESSION['msg']='';
?></p>

</div>
