<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
  $email=$_POST['email'];
  $password=$_POST['password'];

  if(!empty($email) && !empty($password) && !is_numeric($email)){
    $query="insert into login(email,password) values('$email','$password')

    mysqli_query($con,$query);

    echo "<script type='text/javascript'> alert('successfully signup')</script>"
  }
  else{
    echo "<script type='text/javascript'> alert('please enter valid information')</script>""
}}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
 
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form id="loginForm" action="#" method="post">
        <input type="text" id="loginEmail" placeholder="Enter your email">
        <input type="password" id="loginPassword" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form id="signupForm" action="#" method="post">
        <input type="text" id="signupEmail" placeholder="Enter your email" name="email">
        <input type="password" id="signupPassword" placeholder="Create a password" name="password">
        <input type="password" id="confirmPassword" placeholder="Confirm your password">
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>

  <script>
    // Function to validate email
    function validateEmail(email) {
      const re = /\S+@\S+\.\S+/;
      return re.test(email);
    }

    // Function to validate password
    function validatePassword(password) {
      // You can add more conditions for password validation
      return password.length >= 6;
    }

    // Function to validate signup form
    function validateSignupForm() {
      const email = document.getElementById("signupEmail").value;
      const password = document.getElementById("signupPassword").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (!validatePassword(password)) {
        alert("Password must be at least 6 characters long.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }

    // Function to validate login form
    function validateLoginForm() {
      const email = document.getElementById("loginEmail").value;
      const password = document.getElementById("loginPassword").value;

      if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (!validatePassword(password)) {
        alert("Password must be at least 6 characters long.");
        return false;
      }

      return true;
    }

    // Event listeners for form submission
    document.getElementById("signupForm").addEventListener("submit", function(event) {
      if (!validateSignupForm()) {
        event.preventDefault();
      }
    });

    document.getElementById("loginForm").addEventListener("submit", function(event) {
      if (!validateLoginForm()) {
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
