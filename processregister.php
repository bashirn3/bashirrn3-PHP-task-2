<?php session_start();
  require_once('functions/user.php');
  require_once('functions/alert.php');
  require_once('functions/redirect.php');

  $errorCount= 0;

//validation
 $firstName=$_POST["firstName"] !="" ? $_POST["firstName"] : $errorCount++;
 $secondName=$_POST['secondName'] !="" ? $_POST['secondName'] : $errorCount++;
 $email=$_POST['email'] !="" ? $_POST['email'] : $errorCount++;
 $password=$_POST['password'] !="" ? $_POST['password'] : $errorCount++; 
 $gender=$_POST['gender'] !="" ? $_POST['gender'] : $errorCount++;
 $designation=$_POST['designation'] !="" ? $_POST['designation'] : $errorCount++;
 $department=$_POST['department'] !="" ? $_POST['department'] : $errorCount++;





	$_SESSION["firstName"] = $firstName;
	$_SESSION['secondName'] = $secondName;
	$_SESSION['email'] = $email;
	$_SESSION['gender'] = $gender;
	$_SESSION['designation'] = $designation;
	$_SESSION['department'] = $department;


if($errorCount > 0){

     $session_error = "You have " . $errorCount . " blank field";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    redirect_to("register.php");

}
//check if first and second name fields are valid
elseif (!preg_match("/^[a-zA-Z ]*$/", $firstName) || !preg_match("/^[a-zA-Z ]*$/", $secondName)) {
  $_SESSION['error'] = 'Only letters and white spaces allowed in name field';
  redirect_to("register.php");
  die();

}
//check if email field is valid
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['error'] = 'Email is not valid, please try again';
	redirect_to("register.php");
    die();

}
//check if first name and second name fields have enough characters; ie 2 or greater
elseif (strlen($firstName)< 2 || strlen($secondName) < 2) {
	$_SESSION['error']='Name should be longer than 2 characters';
	redirect_to("register.php");
    die();
}

//check if email field has enough characters; ie 5 or greater
elseif (strlen($email)< 5) {
	$_SESSION['error']='Email should be longer than 5 characters';
	redirect_to("register.php");
    die();
}

else{  //Register new user
	   $allUsers= scandir('db/users/');
	   $countAllUsers=count($allUsers);

	  $newUserId = ($countAllUsers-1);
	 $userObject = [
        'id'=>$newUserId,
        'firstName'=>$firstName,
        'secondName'=>$secondName,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department,
        'regDate'=>date("d/m/Y")
     ];
    
  $userExists = find_user($email);

  if($userExists){
		$_SESSION['error']='Registeration failed, user already exists';
		redirect_to("register.php");
		die();
	}


    file_put_contents("db/users/" .$email .".json", json_encode($userObject));

    //check if it's admin that added that user or not
    if(is_user_loggedIn() && $_SESSION['designation']=='admin')  {
      $_SESSION['message']='You have succesfully resgitered a new user';
      redirect_to("SuperAdminDashboard.php");
    }
    else{
      $_SESSION['message']='Registeration Succesful you can now log in ' . $firstName;
      redirect_to("login.php");
    }
}


?>

