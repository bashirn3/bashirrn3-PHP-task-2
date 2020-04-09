<?php include_once('lib/header.php');
?>
<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='admin') { ?>
	
<h1>Welcome to the Dashboard for Admin</h1>

<?php echo "<h4>Logged in user ID: ". $_SESSION['loggedIn']. "</h4>" ?>
<?php echo "<h4>Your role is: ". $_SESSION['designation']. "</h4>" ?>
<?php echo "<h4>Your department: ". $_SESSION['department']. "</h4>" ?>
<?php echo "<h4>You logged in at " .$_SESSION['loginTime']. "</h4>" ?>
<?php echo "<h4>You logged in at " .$_SESSION['loginDate']. "</h4>" ?>
<?php echo "<h4>You registered on " .$_SESSION['loginDate']. "</h4>" ?>


 <?php } else {
 	header("Location: Login.php");
	die('you do not have access to this page');
}?>

<?php include_once('lib/footer.php') ?>