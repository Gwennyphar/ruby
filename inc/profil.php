<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'check.php';
include_once 'inc.php';

$sql = "SELECT fullname, username, pwtext, aktiv
  FROM v_users 
  WHERE uid = ".$user_check;
   
  /**
   * 
   * get user profile
   */
  if ($result = $mysqli->query($sql) ) {
    while($obj  = $result->fetch_object()){
      $fullname = $obj->fullname;
      $username = $obj->username;
      $pwtxt    = $obj->pwtext;
      $active   = $obj->aktiv;
    }
    $result->close();
  }