<?php include_once('lib/header.php') ?>

<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='intern') {
	header("location: dashboard.php");
} ?>

<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='mentor') {
  header("location: dashboard2.php");
} ?>

<?php if (isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn']) && $_SESSION['designation']=='admin') {
  header("location: dashboard3.php");
} ?>

 <h1>Login</h1>
 <p><?php if(isset($_SESSION['message']) &&!empty($_SESSION['message'])){
  echo "<div style='color:green'>" .$_SESSION['message']. "</div>";
  
  session_destroy();
 }?></p>

<p><form action='processlogin.php' method='POST'>
<p>
  <?php if(isset($_SESSION['error']) &&!empty($_SESSION['error'])){
  echo "<span style='color:red'>" .$_SESSION['error']. "</span>";
  
  session_destroy();
}?>

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
	<button type="submit">login</button>
</p>


 
<?php include_once('lib/footer.php') ?>