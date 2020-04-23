<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/user.php');

  $errorCount= 0;

 $email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
 $password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++; 
 

 if($errorCount > 0){

     $session_error = "You have " . $errorCount . " blank field";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    set_alert('error',$session_error);
      
    redirect_to("login.php");
  }
  else{
      $currentUser = find_user($email);

      if ($currentUser){

			$userString= file_get_contents("db/users/".$currentUser->email . ".json");
			$userObject = json_decode($userString);
			$passwordFromDb=$userObject->password;

      
			 $passwordFromUser = password_verify($password, $passwordFromDb);

			 if ($passwordFromDb == $passwordFromUser) {
        $_SESSION["firstName"]=$userObject->firstName;
        $_SESSION['loggedIn']=$userObject->id;
        $_SESSION['designation']=$userObject->designation;
        $_SESSION['department']=$userObject->department;
        $_SESSION['regDate']=$userObject->regDate;
        date_default_timezone_set("Africa/Lagos");
        $_SESSION['loginDate']= date("d/m/Y");
        $_SESSION['loginTime'] = date("h:i:sa");

          if($userObject->designation == 'patient'){
  				redirect_to("patientDashboard.php");
  			 	die();
         }
         elseif ($userObject->designation =='medical-staff') {
          redirect_to("medicalStaffDashboard.php");
          die();
         }

         elseif($userObject->designation == 'admin') {
          redirect_to("SuperAdminDashboard.php");
          die();
         }
		  }

	   
    }
     
    $_SESSION["error"] = "Invalid Email or Password" ;
    redirect_to("login.php");  
  }