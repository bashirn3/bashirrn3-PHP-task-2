<?php include_once('lib/header.php');
      include_once('functions/alert.php');
      include_once('functions/redirect.php');
      include_once('functions/user.php');

?>


<?php if (!is_user_loggedIn()) {

	redirect_to("login.php");
   $_SESSION['error']='You are not authorized to view that page';
     } 
?>

<div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-75">
    <div class="text-center">
        <h3>Appointment Form</h3>
        <p>All fields are required</p>
        <hr>
    </div>
    <div>
        <p>
        <?php  print_alert(); ?>
        </p>
     
      <form action='processappointment.php' method='POST'>
      
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
      	<label for='date'>Date of appointment</label><br>
          <input class="form-control bg-light" type='date' name = 'date-of-appointment' id='date'>
      </p>

      <p>
      	<label for='time'>Time</label><br>
          <input class="form-control  bg-light" type='time' name = 'time-of-appointment' id='time'>
      </p>

      <p>
      	<label for='gender'>Nature of Appointment</label><br>
          <select class="form-control" name='nature-of-appointment'>
          	<option value=''>Select One</option>
          	<option 
                 <?php              
                     if(isset($_SESSION['nature-of-appointment']) && $_SESSION['nature-of-appointment'] == 'new'){
                        echo "selected";               
                  }?>
          	value='new'>New appointment</option>
          	<option 
                <?php              
                     if(isset($_SESSION['nature-of-appointment']) && $_SESSION['nature-of-appointment'] == 'follow-up'){
                        echo "selected";               
                  }?>
          	value='follow-up'>Follow up appointment</option>
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
      	<label for='initial-complaint'>Initial Complaint</label><br>
        <textarea  class="form-control bg-light" row="5" name ='initial-complaint' id='initial-complaint'> 
        </textarea>
      </p>
      <p>
      <button class="btn btn-success btn-block"  type='submit'>Book Appointment</button>
      </p>
 </form>
</div>
</div>



<?php include_once('lib/footer.php'); ?>