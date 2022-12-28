<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  include_once 'inc.php';


  if( filter_input(INPUT_GET, 'id') ) {
    $id         = filter_input(INPUT_GET, 'id');
    $location_d = getLocationDetails($mysqli, $id);
  }


  /**
   * 
   * location details 
   * @param type $mysqli
   * @param type $id
   * @return type
   */
  function getLocationDetails($mysqli, $id) {
    $sql = "SELECT id, location, country
            FROM v_locations
            WHERE id = ".$id;
    
    if($result = $mysqli->query($sql)) {
      $arr[] = '';
      while($obj  = $result->fetch_object()){
        $arr = array(
         'id'        => $obj->id,
         'location'  => $obj->location,
         'country'   => $obj->country
        );
      }
    }
    $result->close();
    return $arr;
  }

