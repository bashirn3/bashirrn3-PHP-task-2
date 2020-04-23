<?php include_once('lib/header.php');
 require_once('functions/alert.php');
 require_once('functions/user.php');

?>

<?php if (is_user_loggedIn() && $_SESSION['designation']=='patient') {
    header("location: patientDashboard.php");
     } 
?>

<?php if (is_user_loggedIn() && $_SESSION['designation']=='medical-staff') {
  header("location: medicalStaffDashboard.php");
      } 
?>

<div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-25">
    <div class="text-center">
        <h3>Login</h3>
        <hr>
    </div>
    <div>
        <p>
        <?php  print_alert(); ?>
        </p>
        <form method="POST" action="processlogin.php">
    
                
            <p>
                <label>Email:</label><br />
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control bg-light" name="email" placeholder="Email"  />
            </p>

            <p>
                <label>Password:</label><br />
                <input class="form-control" type="password" name="password" placeholder="Password"  />
            </p>       
        
        
            <p>
                <button class="btn btn-success btn-block" type="submit">Login</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a><br />
                <a href="register.php">Don't have an account? Register</a>
            </p>
        </form>
    </div>
</div>


 
<?php include_once('lib/footer.php') ?>

