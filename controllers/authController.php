<?php 

session_start();

require'config/db.php'

$errors = array();
$username = "";
$email = "";

//if user clicks on the signup button

if(isset($_POST['signup-btn'])){
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConf = $_POST['PasswordConf'];

//validation

if(empty($username)){
$errors['username'] = "Username Required";
}

//Email Validation & Error Message

if(empty($email)){
$errors['email'] = "Email Required";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email Address Is Invalid";
}


//Password Validation & Error Message

if(empty($password)){
$errors['password'] = "Password Required";
}

if($password !== $passwordConf){
$errors['password'] = "Passwords Do Not Match";
}


//See If Email Already Exists
$emailQuery = "SELECT * FROM users WHERE email=? LIMIT1";
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;
$stmt->close();


is ($userCount > 0) {
    $errors['email'] = "Email Already Exists";
}


if(count($errors === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;

    $sql = "INSTERT INTO users(username, email, verified, token, password) VALUES (?, ?, ?, ?, ?,)";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('ssbss', $username, $email, $verified, $token $password);

  if  $stmt->execute()){

    //login user
    $user_id = $conn->insert_id;
    $_session['id'] = $user_id;
    $_session['username'] = $username;
    $_session['email'] = $email;
    $_session['verified'] = $verified;
    //flash message
    $_SESSION['message'] = "You are now logged in";
    $_SESSION['alert-class'] = "alert-success";
    header('location: index.php');
    exit();


  } else {
      $errors['db_error'] = "Database error : failed to register";
  }


}


}