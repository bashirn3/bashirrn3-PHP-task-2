<?php include_once('lib/header.php');
      include_once('functions/user.php');
      include_once('functions/redirect.php'); 

?>
<?php if (is_user_loggedIn() && $_SESSION['designation']=='admin') { ?>
	

    <div class="d-flex justify-content-between">

      <div class= "ml-3">
        <h1>Welcome to the Dashboard for Super Admin</h1>

         <!-- <?php echo "<h4>Logged in user ID: ". $_SESSION['loggedIn']. "</h4>" ?> -->
         

         <?php echo "<h4>Welcome " . $_SESSION["firstName"]. "," . " You are logged in as a ( ". $_SESSION['designation']. " )</h4>" ?>
      </div>

      <div class="d-flex flex-column align-items-end mr-5">

        <?php echo "<h4>Department: ". $_SESSION['department']. "</h4>" ?>
        <?php echo "<h4>You logged in at " .$_SESSION['loginTime']. "</h4>" ?>

        <!-- <?php echo "<h4>You logged in at " .$_SESSION['loginDate']. "</h4>" ?> -->

        <?php echo "<h4>Date of registeration: " .$_SESSION['regDate']. "</h4>" ?>
      </div>
    </div>
    <div class="mt-3 mb-3 ml-3">
      <a href="register.php" class="btn btn-info" role="button">Add New User</a>
      <a href="allMedicalStaff.php" class="btn btn-info" role="button">View all Staff</a>
      <a href="allPatients.php" class="btn btn-info" role="button">View all Patients</a>
    </div>

<?php } else {
 	  redirect_to("login.php");
    $_SESSION["error"] = "You are not authorized to view that page";

}?>

<?php include_once('lib/footer.php') ?>


