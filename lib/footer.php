<a href='index.php'>Home</a> |
<?php if (!isset($_SESSION['loggedIn'])) {?>

<a href='register.php'>Register</a> |
<a href='login.php'>Login</a> |
<?php } else { ?>
<a href='logout.php'>Logout</a> |
<?php } ?>
<?php if (isset($_SESSION['designation']) && $_SESSION['designation'] =='admin') {?>
<a href="register.php">Add New User</a>
<?php } ?>
</body>
</html>