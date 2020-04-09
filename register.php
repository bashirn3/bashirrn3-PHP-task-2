<?php
 include_once('lib/header.php') ?>

<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='intern') {
	header("location: dashboard.php");
} ?>

<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='mentor') {
  header("location: dashboard2.php");
} ?>

<h1>Register</h1>
<p>All fields are required</p>
<form action='processregister.php' method='POST'>
<p>
  <?php if(isset($_SESSION['error']) &&!empty($_SESSION['error'])){
  echo "<span style='color:red'>" .$_SESSION['error']. "</span>";
  
  session_destroy();
}?>

</p>

<p>
  <?php if(isset($_SESSION['err']) && !empty($_SESSION['err'])){
  echo "<span style='color:red'>" .$_SESSION['err']. "</span>";

  session_destroy();
}?>

</p>
<p>
	<label for='firstName'>First Name</label><br>
    <input 

    <?php 
      if(isset($_SESSION['firstName'])){
        echo "value=" . $_SESSION['firstName'];
  
      }
    ?>

    type='text' name = 'firstName' id='firstName'>
</p>

<p>
	<label for='secondName'>Second Name</label><br>
    <input 

     <?php 
      if(isset($_SESSION['secondName'])){
        echo "value=" . $_SESSION['secondName'];
  
      }
    ?>

    type='text' name = 'secondName' id='secondName'>
</p>
<p>
	<label for='email'>Email</label><br>
    <input 
      
     <?php 
      if(isset($_SESSION['email'])){
        echo "value=" . $_SESSION['email'];
  
      }
    ?>
   
    type='email' name = 'email' id='email'>
	
</p>
<p>
	<label for='password'>Password</label><br>
    <input type='password' name = 'password' id='password'>
</p>
<p>
	<label for='gender'>Gender</label><br>
    <select name='gender'>
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
<p>
<p>
 <label for='gender'>Designation</label><br>
    <select name='designation'>
    	<option value=''>Select One</option>
    	<option 
          <?php              
               if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'mentor'){
                  echo "selected";               
            }?>
    	value='mentor'>Mentor</option>
    	<option 
          <?php              
               if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'intern'){
                  echo "selected";               
            }?>
    	value='intern'>Intern</option>
    	<option 
          <?php              
               if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'admin'){
                  echo "selected";               
            }?>
    	value='admin'>Admin</option>
    </select> 
<p>
<p>
 <label for='gender'>Department</label><br>
    <select name='department'>
    	<option value=''>Select One</option>
    	<option 
          <?php              
               if(isset($_SESSION['department']) && $_SESSION['department'] == 'Front-end'){
                  echo "selected";               
            }?>
    	value='Front-end'>Front-end</option>
    	<option 
    	  <?php              
               if(isset($_SESSION['department']) && $_SESSION['department'] == 'Back-end'){
                  echo "selected";               
            }?>
    	value='Back-end'>Back-end</option>
    	<option
          <?php              
               if(isset($_SESSION['department']) && $_SESSION['department'] == 'Mobile'){
                  echo "selected";               
            }?>
    	 value='Mobile'>Mobile</option>
    </select> 
<p>
<button type='submit'>Submit</button>
</p>
<?php include_once('lib/footer.php') ?>