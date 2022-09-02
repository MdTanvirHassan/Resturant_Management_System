<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 
$db = mysqli_connect('localhost', 'root', '', 'test1');

if (isset($_POST['reg_user'])) {
    $fullname = mysqli_real_escape_string($db, $_POST['fname']);
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['con_password']);
    if(isset($_REQUEST['gender-1']))
        {
            $gender = mysqli_real_escape_string($db, 'MALE');
        }
        if(isset($_REQUEST['gender-2']))
        {
            $gender = mysqli_real_escape_string($db, 'FEMALE');
        }
        if(isset($_REQUEST['gender-3']))
        {
            $gender = mysqli_real_escape_string($db, 'Prefer not to say');
        }
    if (empty($username)) { array_push($errors, "Username is required!"); }
    if (empty($email)) { array_push($errors, "Email is required!"); }
    if (empty($password_1)) { array_push($errors, "Password is required!"); }
    if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match!");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM persons_cust WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists!");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists!");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in!";
  	header('location: indexx.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required!");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required!");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  $_SESSION['success'] = "You are now logged in!";
  	  header('location: indexx.php');
  	}else {
  		array_push($errors, "Wrong username/password combination!");
  	}
  }
}

?>