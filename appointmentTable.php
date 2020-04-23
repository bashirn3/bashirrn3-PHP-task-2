<?php include_once('lib/header.php');
      include_once('functions/redirect.php');
      include_once('functions/alert.php');
      include_once('functions/user.php');
 ?>

<?php if (!is_user_loggedIn() || $_SESSION['designation']!='medical-staff'){
  
  redirect_to("login.php");
  $_SESSION['error']='You are not authorized to view that page';
     } 
?>

<div class="container shadow p-3 mt-5 mb-5 bg-white rounded w-75">
	<?php echo'<h1 class="text-center pb-2">All appointments for ' . $_SESSION['department'] .' Department </h1>' ?>
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Patient Name</th>
	      <th scope="col">Date of Appointment</th>
	      <th scope="col">Time of Appointment</th>
	      <th scope="col">Nature of Appointment</th>
	      <th scope="col">Initial Complaint</th>
	    </tr>
	  </thead>
	  <tbody>
        <?php

          // scan all appointments uses slice to remove hidden files
          $appointments =  array_slice(scandir("db/appointments/".$_SESSION['department']."/"), 2);
          $countAllAppointments = count($appointments);
            for ($counter = 0; $counter < $countAllAppointments ; $counter++){

          	    $appointment=$appointments[$counter];
                //fetch all appointments for that department
          	    $appointmentString = file_get_contents("db/appointments/".$_SESSION['department']."/".$appointment);
          	    $appointmentObject = json_decode($appointmentString);

                

          	    if ($countAllAppointments > 0)  {
          	    	echo   '<tr>
						      <td>'.$appointmentObject->firstName.' '. $appointmentObject->secondName.'</td>
						      <td>'.$appointmentObject->dateOfAppointment.'</td>
						       <td>'.$appointmentObject->timeOfAppointment.'</td>
						      <td>'.$appointmentObject->natureOfAppointment.'</td>
						      <td>'.$appointmentObject->initialComplaint.'</td>
	                        </tr>' ;

          	    }else{
                  echo '<h3 class="alert alert-info">You have no pending appointments</h3>';
          	    	
          	    }
          	}
   
        ?>
	    
	  </tbody>
	</table>
</div>

<?php include_once('lib/footer.php') ?>