<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new User();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->insert();
}

if(isset($_POST['login']))	{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$sql = "SELECT * FROM users where email='$email' and password='$password'";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["id"]=$row["id"];
		$_SESSION["name"]=$row["name"];
		header("Location:profile.php");
	}
}
?>
<style>
	td strong{
		font-weight:bold;
font-size:50px;
	}
	</style>
<table width='100%' align='center' >
	<tr>
		<td  align="center"><strong>Login<strong></td>
		<td></td>
		<td align="center"><strong>SignUp</strong></td>
	</tr>
	<tr>
		<td width='40%' align="center"><?php echo $view->loginForm();?></td>
		<td align="center">OR</td>
		<td width='40%' align="center"><?php echo $view->signupForm();?></td>
	</tr>
</table>
