<?php
 include_once('lib/header.php');
 require_once('functions/alert.php');
 require_once('functions/user.php') ?>

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
        <h3>Register</h3>
        <p>All fields are required</p>
        <hr>
    </div>
    <div>
        <p>
        <?php  print_alert(); ?>
        </p>
     
      <form action='processregister.php' method='POST'>
      
      <p>
      	<label for='firstName'>First Name</label><br>
          <input 

          <?php 
            if(isset($_SESSION['firstName'])){
              echo "value=" . $_SESSION['firstName'];
        
            }
          ?>

           class="form-control bg-light" type='text' name = 'firstName' id='firstName'>
      </p>

      <p>
      	<label for='secondName'>Second Name</label><br>
          <input 

           <?php 
            if(isset($_SESSION['secondName'])){
              echo "value=" . $_SESSION['secondName'];
        
            }
          ?>

         class="form-control bg-light" type='text' name = 'secondName' id='secondName'>
      </p>

      <p>
      	<label for='email'>Email</label><br>
          <input 
            
           <?php 
            if(isset($_SESSION['email'])){
              echo "value=" . $_SESSION['email'];
        
            }
          ?>
         
          class="form-control bg-light" type='email' name = 'email' id='email'>
      	
      </p>

      <p>
      	<label for='password'>Password</label><br>
          <input class="form-control  bg-light" type='password' name = 'password' id='password'>
      </p>

      <p>
      	<label for='gender'>Gender</label><br>
          <select class="form-control" name='gender'>
          	<option value=''>Select One</option>
          	<option 
                 <?php              
                     if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){
                        echo "selected";               
                  }?>
          	value='male'>Male</option>
          	<option 
                <?php              
                     if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
                        echo "selected";               
                  }?>
          	value='female'>Female</option>
          </select> 
      </p>

      <p>
       <label for='gender'>Designation</label><br>
          <select class="form-control" name='designation'>
          	<option value=''>Select One</option>
          	<option 
                <?php              
                     if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'patient'){
                        echo "selected";               
                  }?>
          	value='patient'>Patient</option>
          	<option 
                <?php              
                     if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'medical-staff'){
                        echo "selected";               
                  }?>
          	value='medical-staff'>Medical Team(MT)</option>
          </select> 
      </p>

      <p>
       <label for='gender'>Department</label><br>
          <select class="form-control" name='department'>
          	<option value=''>Select One</option>


          	<option 
                <?php              
                     if(isset($_SESSION['department']) && $_SESSION['department'] == 'emergency'){
                        echo "selected";               
                  }?>
          	value='emergency'>Emergency</option>
          	<option 
          	  <?php              
                     if(isset($_SESSION['department']) && $_SESSION['department'] == 'nephrology'){
                        echo "selected";               
                  }?>
          	value='nephrology'>Nephrology</option>
          	<option
                <?php              
                     if(isset($_SESSION['department']) && $_SESSION['department'] == 'maternity'){
                        echo "selected";               
                  }?>
          	 value='maternity'>Maternity</option>
          </select> 
      </p>

      <p>
      <button class="btn btn-success btn-block"  type='submit'>Register</button>
      </p>
 </form>
</div>
</div>
<?php include_once('lib/footer.php') ?>