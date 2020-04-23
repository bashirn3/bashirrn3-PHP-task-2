<?php session_start();
      include_once('functions/alert.php');
      include_once('functions/redirect.php');




 $errorCount= 0;

//validation
 $firstName=$_POST["firstName"] !="" ? $_POST["firstName"] : $errorCount++;
 $secondName=$_POST['secondName'] !="" ? $_POST['secondName'] : $errorCount++;
 $dateOfAppointment=$_POST['date-of-appointment'] !="" ? $_POST['date-of-appointment'] : $errorCount++;
 $timeOfAppointment=$_POST['time-of-appointment']  !="" ? $_POST['time-of-appointment'] : $errorCount++;
 $natureOfAppointment=$_POST['nature-of-appointment'] !="" ? $_POST['nature-of-appointment'] : $errorCount++;
 $department=$_POST['department'] !="" ? $_POST['department'] : $errorCount++;
 $initialComplaint=$_POST['initial-complaint'] !="" ? $_POST['initial-complaint'] : $errorCount++;




	$_SESSION["firstName"] = $firstName;
	$_SESSION['secondName'] = $secondName;
    $_SESSION['nature-of-appointment'] = $natureOfAppointment;
    $_SESSION["department"] = $department;
    $_SESSION["initial-complaint"] = $initialComplaint;


if($errorCount > 0){

     $session_error = "You have " . $errorCount . " blank field";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    set_alert('error', $session_error);

    redirect_to("appointment.php");
	}
else{
	$appointmentObject = [
        'firstName'=>$firstName,
        'secondName'=>$secondName,
        'dateOfAppointment'=>$dateOfAppointment,
        'timeOfAppointment'=>$timeOfAppointment,
        'natureOfAppointment'=>$natureOfAppointment,
        'department'=>$department,
        'initialComplaint'=>$initialComplaint
     ];
    
	file_put_contents("db/appointments/".$_SESSION['department']."/" .$firstName.'-'.$secondName .".json", json_encode($appointmentObject));

	$session_message="You have succesfully booked an appointment";
	set_alert('message', $session_message);

    redirect_to("appointment.php");
}

	?>

