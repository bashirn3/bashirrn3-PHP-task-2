<?php include_once('lib/header.php');
      include_once('functions/user.php');
      include_once('functions/redirect.php');
?>
<?php if (is_user_loggedIn() && $_SESSION['designation']=='medical-staff') { ?>
<div class="d-flex justify-content-between">

  <div class= "ml-3">
    <h1>Medical Staff Dashboard</h1>

    <!-- <?php echo "<h4>Logged in user ID: ". $_SESSION['loggedIn']. "</h4>" ?>
     -->

     <?php echo "<h4>Welcome " . $_SESSION["firstName"]. "," . " You are logged in as a ( ". $_SESSION['designation']. " )</h4>" ?>
     <a class=" btn btn-success mt-3" href="appointmentTable.php">View appointments</a>
  </div>

  <div class="d-flex flex-column align-items-end mr-5">

    <?php echo "<h4>Department: ". $_SESSION['department']. "</h4>" ?>
    <?php echo "<h4>You logged in at " .$_SESSION['loginTime']. "</h4>" ?>

    <!-- <?php echo "<h4>You logged in at " .$_SESSION['loginDate']. "</h4>" ?> -->

    <?php echo "<h4>Date of registeration: " .$_SESSION['regDate']. "</h4>" ?>
  </div>
</div>

<?php } else {
      redirect_to("login.php");
    $_SESSION["error"] = "You are not authorized to view that page";

}?>
<?php include_once('lib/footer.php') ?>