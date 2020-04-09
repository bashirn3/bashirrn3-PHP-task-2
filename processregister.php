<?php session_start();

  $errorCount= 0;

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

    header("Location: register.php");

}elseif (!preg_match("/^[a-zA-Z ]*$/", $firstName) || !preg_match("/^[a-zA-Z ]*$/", $secondName)) {
  $_SESSION['err'] = 'Only letters and white spaces allowed in name field';
  header("Location:register.php");
  die();

}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['err'] = 'Email is not valid, please try again';
	header("Location:register.php");
    die();

}elseif (strlen($firstName)< 2 || strlen($secondName) < 2) {
	$_SESSION['err']='Name should be longer than 2 characters';
	header("Location:register.php");
    die();
}
elseif (strlen($email)< 5) {
	$_SESSION['err']='Email should be longer than 5 characters';
	header("Location:register.php");
    die();
}
else{
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
        'department'=>$department
    ];
    
for($i=0; $i<$countAllUsers; $i++){
	$currentUser = $allUsers[$i];

	if ($currentUser==$email.".json") {
		$_SESSION['error']='Registeration failed, user already exists';
		header("Location: register.php");
		die();
	}
}

    file_put_contents("db/users/" .$email .".json", json_encode($userObject));
    $_SESSION['message']='Registeration Succesful you can now log in ' . $firstName;
    $_SESSION['loginDate']= date("d/m/Y");
    header("Location:login.php");
 }


?>

