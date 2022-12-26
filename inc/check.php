<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'login.php';
include_once 'inc.php';
$user_check = $_SESSION['uid'];
$sql = "SELECT username FROM v_users WHERE uid='$user_check'";

if($result = $mysqli->query($sql)) {
  while($obj  = $result->fetch_object()){
    $login_user = $obj->username;
  }
}
$result->close();