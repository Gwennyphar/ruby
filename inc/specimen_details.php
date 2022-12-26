<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  include_once 'inc.php';


  if( filter_input(INPUT_GET, 'id') ) {
    $id    = filter_input(INPUT_GET, 'id');
    $specimen_d = getSpecimenDetails($mysqli, $id);
  }

  /**
   * Alle Mineralien Details fuer Detailansicht laden
   * @param type $mysqli
   * @param type $id
   * @return type
   */
  function getSpecimenDetails($mysqli, $id) {
    $sql = "SELECT id, type, title, date, number, description, id_mineral, mineral, formula, id_location, location, country, id_file, link
      FROM v_collection
      WHERE id = ".$id;
    
    if($result = $mysqli->query($sql)) {
      $arr[] = '';
      while($obj = $result->fetch_object()){
        $arr = array(
          'id'            => $obj->id,
          'type'          => $obj->type,
          'title'         => utf8_encode($obj->title),
          'date'          => date('d.m.Y', strtotime($obj->date)),
          'number'        => $obj->number,
          'description'   => utf8_encode($obj->description),
          'id_mineral'    => $obj->id_mineral,
          'mineral'       => utf8_encode($obj->mineral),
          'formula'       => utf8_encode($obj->formula),
          'id_location'   => $obj->id_location,
          'location'      => utf8_encode($obj->location),
          'country'       => utf8_encode($obj->country),
          'id_file'       => $obj->id_file,
          'link'          => $obj->link,
        );
      }
    }
    $result->close();
    return $arr;
  }