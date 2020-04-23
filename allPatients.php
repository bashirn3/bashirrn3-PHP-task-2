<?php include_once('lib/header.php');
      include_once('functions/redirect.php');
      include_once('functions/alert.php');
      include_once('functions/user.php');
 ?>


<?php if (!is_user_loggedIn() || $_SESSION['designation']!='admin'){
  
  redirect_to("login.php");
  $_SESSION['error']='You are not authorized to view that page';
     } 
?>

<div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-75">
	<?php echo'<h1 class="text-center pb-2">All patients </h1>' ?>
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">user ID</th>
	      <th scope="col">First Name</th>
	       <th scope="col">Second Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Gender</th>
	      <th scope="col">Designation</th>
	      <th scope="col">Departemnt</th>
	    </tr>
	  </thead>
	  <tbody>
        <?php

          // scan all users
          $users =  array_slice(scandir("db/users/"), 2);
          $countAllUsers = count($users);
            for ($counter = 0; $counter < $countAllUsers ; $counter++){

          	    $user=$users[$counter];
                //fetch all users
          	    $userString = file_get_contents("db/users/".$user);
          	    $userObject = json_decode($userString);

                
                 // checks if user is a patient
          	    if ($userObject->designation == 'patient')  {
          	    	//display all patients
          	    	echo   '<tr>
						      <td>'.$userObject->id.'</td>
						      <td>'.$userObject->firstName.'</td>
						      <td>'.$userObject->secondName.'</td>
						      <td>'.$userObject->email.'</td>
						      <td>'.$userObject->gender.'</td>
						      <td>'.$userObject->designation.'</td>
						      <td>'.$userObject->department.'</td>
	                        </tr>' ;

          	    }
          	}
   
        ?>
	    
	  </tbody>
	</table>
</div>

<?php include_once('lib/footer.php') ?>