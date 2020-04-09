<?php session_start();

  $errorCount= 0;

 $email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
 $password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++; 
 

 if($errorCount > 0){

     $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: login.php");
  }
  else{
    
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for($i=0; $i<$countAllUsers; $i++){
	  $currentUser = $allUsers[$i];

		if ($currentUser==$email.".json") {
			$userString= file_get_contents("db/users/".$currentUser);
			$userObject = json_decode($userString);
			$passwordFromDb=$userObject->password;

      
			 $passwordFromUser = password_verify($password, $passwordFromDb);

			 if ($passwordFromDb == $passwordFromUser) {
        $_SESSION['loggedIn']=$userObject->id;
        $_SESSION['designation']=$userObject->designation;
        $_SESSION['department']=$userObject->department;
        date_default_timezone_set("Africa/Lagos");
        $_SESSION['loginDate']= date("d/m/Y");
        $_SESSION['loginTime'] = date("h:i:sa");

          if($userObject->designation == 'intern'){
  				header("Location:dashboard.php");
  			 	die();
         }
         elseif ($userObject->designation =='mentor') {
          header("Location:dashboard2.php");
          die();
         }

         elseif($userObject->designation == 'admin') {
          header("Location:dashboard3.php");
          die();
         }
		  }

	   }
    }
     
    $_SESSION["error"] = "Invalid Email or Password" ;
    header("Location: login.php");  
  }