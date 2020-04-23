<?php include_once('lib/header.php');  
     require_once('functions/alert.php'); 
     require_once('functions/user.php');
     require_once('functions/redirect.php');
?>

<?php if (is_user_loggedIn()) {
   redirect_to('login.php');
   $_SESSION['error']='You are not authorized to handle that page';
}?>

   <div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-25">
      <div class="text-center">
       <h3>Forgot Password</h3>
       <p>Provide the email address associated with your account</p>
       <hr>
      </div>
       <form action="processforgot.php" method="POST">
       <p>
            <?php print_alert() ; ?>
        </p>
       <p>
            <label>Email</label><br />
            <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                             
                }                
            ?>

                class="form-control bg-light"type="text" name="email" placeholder="Email"  />
        </p>
        <p>
            <button class="btn btn-success" type="submit">Send Reset Code</button>
        </p>
       </form>
  </div>
    
<?php include_once('lib/footer.php'); ?>