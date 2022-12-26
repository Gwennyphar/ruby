<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  include_once 'inc.php';


  if( filter_input(INPUT_GET, 'id') ) {
    $id        = filter_input(INPUT_GET, 'id');
    $mineral_d = getMineralDetails($mysqli, $id);
  }


  /**
   * 
   * mineral details 
   * @param type $mysqli
   * @param type $id
   * @return type
   */
  function getMineralDetails($mysqli, $id) {
    $sql = "SELECT id, name, formula
            FROM v_minerals
            WHERE id = ".$id;
    
    if($result = $mysqli->query($sql)) {
      $arr[] = '';
      while($obj  = $result->fetch_object()){
        $arr = array(
         'id'        => $obj->id,
         'name'      => utf8_encode($obj->name),
         'formula'   => utf8_decode($obj->formula)
        );
      }
    }
    $result->close();
    return $arr;
  }

