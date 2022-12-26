<?php

  /* 
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */
//  include_once '../../inc/check.php';
  
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

  $output = json_encode(array('brand'=>$brand, 'pwTxt'=>$txtPwd, 'type'=>'success', 'title' => 'Passwort: ', 'text' => 'Passwort erfolgreich generiert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
  die($output);