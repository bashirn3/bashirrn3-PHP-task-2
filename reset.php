<?php include_once('lib/header.php'); 
    require_once('functions/alert.php');
    require_once('functions/user.php');


if(!is_user_loggedIn() && !is_token_set()){
     header("Location: login.php");
    $_SESSION["error"] = "You are not authorized to view that page";
  
}

?>
   <div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-25">
      <div class="text-center">
           <h3>Reset Password</h3>
           <p>Reset Password associated with your account : [email]</p> 
           <hr>
      </div>

           <form action="processreset.php" method="POST">
           <p>
                <?php  print_alert(); ?>
            </p>
            <?php if(!is_user_loggedIn()) { ?>
            <input
                    
                    <?php              
                        if(is_token_set_in_session()){
                            echo "value='" . $_SESSION['token'] . "'";                                                             
                        }else{
                            echo "value='" . $_GET['token'] . "'";
                        }             
                    ?>

                   type="hidden" name="token"  />
            <?php } ?>

            <p>
                <label>Email</label><br />
                <input
                    
                    <?php              
                        if(isset($_SESSION['email'])){
                            echo "value=" . $_SESSION['email'];                                                             
                        }                
                    ?>

                    class="form-control" type="text" name="email" placeholder="Email"  />
            </p>
            <p>
                <label>Enter New Password</label><br />
                <input class ="form-control" type="password" name="password" placeholder="Password"  />
            </p>
            <p>
                <button class ="btn btn-success btn-block" type="submit">Reset Password</button>
            </p>
           </form>
    </div>      
<?php include_once('lib/footer.php'); ?>