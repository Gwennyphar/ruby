<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'db.php'; //Establishing connection with our database

$error = ""; //Variable for storing our errors.
if( filter_input(INPUT_POST, 'submit') ) {
  if( empty( filter_input(INPUT_POST, 'uname') )  || empty( filter_input(INPUT_POST, 'pwd')) ) {
    $error = "Füllen Sie bitte beide Felder aus."; 
  }else {
    // Define $uname and $pwd
    $username = filter_var(filter_input(INPUT_POST, 'uname'), FILTER_SANITIZE_STRING);
    $passwd = filter_var(filter_input(INPUT_POST, 'pwd'), FILTER_SANITIZE_STRING);

    // To protect from MySQL injection
    $uname = stripslashes($username);
    $pwd = stripslashes($passwd);
    $name = mysqli_real_escape_string($mysqli, $uname);
    $pw = mysqli_real_escape_string($mysqli, $pwd);
    $hash = md5($pw);

    //Check username and password from database
    $sql = "SELECT uid, username FROM v_users WHERE username='$name' AND password='$hash' AND aktiv = 1";

    //If username and password exist in our database then create a session.
    //Otherwise echo error.
     if ($result = $mysqli->query($sql)) {
      while($obj = $result->fetch_object()){
        $_SESSION['uid'] = $obj->uid;
      }
       header("location: dashboard.php"); // Redirecting To Other Page
    } else {
      $error = '<div class="bs-component">
        <div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><strong>Benutzername</strong> oder <strong>Passwort</strong> ist falsch.<a class="alert-link" href="#">
        </div>';
    }
    $result->close();
  }
}
