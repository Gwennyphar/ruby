<?php

  /* 
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */
  include_once '../../inc/check.php';
  
  /**
   * create passwort radnom string & numbers
   * @param type $length
   * @param type $chars
   */
  function randomPwd($length, $chars) {
    srand( (double)microtime()*1000000 );
    $i = 0; 
    $pwd = '' ; 
 
    while ($i < $length) { 
        $num  = rand() % strlen($chars); 
        $tmp  = substr($chars, $num, 1); 
        $pwd  = $pwd . $tmp;
        $i++; 
    } 
    return $pwd; 
  }
  $txtPwd = randomPwd(8, 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789');
  $newPwd = md5($txtPwd);
 
  
  
  
  
  if(filter_var(filter_input(INPUT_POST, 'uid'), FILTER_SANITIZE_STRING)) {
    $uid = filter_var(filter_input(INPUT_POST, 'uid'), FILTER_SANITIZE_STRING);
    $tbl = 'logins';
  } else if(filter_var(filter_input(INPUT_POST, 'gid'), FILTER_SANITIZE_STRING)) {
    $gid = filter_var(filter_input(INPUT_POST, 'gid'), FILTER_SANITIZE_STRING);
    $tbl = 'login';
  }
  
  
  $update = "UPDATE $tbl l "
    . "SET l.md5 = '$newPwd', l.pwd = '$txtPwd' "
    . "WHERE l.uid = ".$uid;
 
  
  if(isset($update)) {
    $stmnt = $mysqli->prepare($update);
    $stmnt->execute();
  }
  
  if($stmnt == true) {
    $output = json_encode(array('brand'=>$brand, 'password'=>$newPwd, 'pwTxt'=>$txtPwd, 'type'=>'success', 'title' => 'Passwort: ', 'text' => $txtPwd.' erfolgreich erstellt.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
    die($output);
  } else {
    $output = json_encode(array('type'=>'error', 'title' => ' Fehler: ', 'text' => 'Passwort speichern nicht möglich.', 'alert' => 'info', 'icon'=>'fa fa-bug'));  
    die($output);
  }