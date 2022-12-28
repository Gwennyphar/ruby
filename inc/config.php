<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  $collection = getCollection($mysqli);
  $selMineral = getMineral($mysqli, 'sel_mineral', null, 'sel_mineral');
  $minerals   = getMinerals($mysqli);
  $selLocal   = getLocation($mysqli, 'sel_local', null, 'sel_local');
  $locations  = getLocations($mysqli);
  $users      = getUsers($mysqli);
  
 
 /**
  * 
  * @param type $mysqli
  * @param type $name
  * @param type $select
  * @param type $id
  * @return type
  */
 function getMineral($mysqli, $name, $select, $id) {
    $sql = "SELECT id, name"
      . " FROM v_minerals";
    if($result = $mysqli->query($sql)) {
      $open = '<select name="'.$name.'" id="'.$id.'" aria-controls="sampleTable"  class="form-control">'; 
      $opt = '<option value="#">Mineral auswählen</option>';
      while($obj = $result->fetch_object()){
        if($obj->id == $select) {
          $selected = 'selected'; 
        }else {
          $selected = '';
        }
        $opt .= '<option '.$selected.' value="'.$obj->id.'">'.$obj->name.'</option>';
      }
      $close = '</select>';
    }
    return $open.$opt.$close;
  }
  
  
  /**
   * 
   * @param type $mysqli
   * @param type $name
   * @param type $select
   * @param type $id
   * @return type
   */
 function getLocation($mysqli, $name, $select, $id) {
    $sql = "SELECT id, location, full_location"
      . " FROM v_locations";
    if($result = $mysqli->query($sql)) {
      $open = '<select name="'.$name.'" id="'.$id.'" aria-controls="sampleTable"  class="form-control">'; 
      $opt = '<option value="#">Fundort auswählen</option>';
      while($obj = $result->fetch_object()){
        if($obj->id == $select) {
          $selected = 'selected'; 
        }else {
          $selected = '';
        }
        $opt .= '<option '.$selected.' value="'.$obj->id.'">'.$obj->full_location.'</option>';
      }
      $close = '</select>';
    }
    return $open.$opt.$close;
  }

  
 /**
  * 
  * @param type $mysqli
  * @return type
  */
 function getLocations($mysqli) {
    $sql = "SELECT id, location, full_location, country
      FROM v_locations
      Where 1";
    
    if($result = $mysqli->query($sql) ) {
      $i = 0;
      $arr[] = '';
      while($obj = $result->fetch_object()){
        $arr[] = array(
          'cnt'            => ++$i,
          'id'             => $obj->id,
          'location'       => $obj->location,
          'full_location'  => $obj->full_location,
          'country'        => $obj->country,
        );
      }
    }
    $result->close();
    return $arr;
  }

  
  /**
   * 
   * @param type $mysqli
   * @return type
   */
 function getMinerals($mysqli) {
    $sql = "SELECT id, name, formula
      FROM v_minerals
      Where 1";
    
    if($result = $mysqli->query($sql) ) {
      $i = 0;
      $arr[] = '';
      while($obj = $result->fetch_object()){
        $arr[] = array(
          'cnt'       => ++$i,
          'id'        => $obj->id,
          'name'      => $obj->name,
          'formula'   => $obj->formula,
        );
      }
    }
    $result->close();
    return $arr;
  }
  

  /**
   * 
   * @param type $mysqli
   * @return type
   */
  function getCollection($mysqli) {
    $sql = "SELECT id, type, title, date, number, description, mineral, formula, location, full_location, country, link
      FROM v_collection";
    $arr[] = '';
    $result = $mysqli->query($sql);
    if ($result == true) {
      $i = 0;
      $arr[] = '';
      while($obj = $result->fetch_object()){
        $arr[] = array(
          'cnt'           => ++$i,
          'id'            => $obj->id,
          'type'          => $obj->type,
          'title'         => shortText($obj->title, 165),
          'date'          => date('m.Y', strtotime($obj->date)),
          'number'        => $obj->number,
          'description'   => $obj->description,
          'mineral'       => $obj->mineral,
          'formula'       => $obj->formula,
          'location'      => $obj->full_location,
          'country'       => $obj->country,
          'link'          => $obj->link,
        );
      }
      $result->close();
    }
    return $arr;
  }  

  
  /**
   * Tabelle mit allen Benutzern laden
   */
  function getUsers($mysqli) {
    $sql = "SELECT  uid, fullname, username, aktiv
      FROM v_users
      Where uid != ".$_SESSION['uid']; //AND aktiv = 1

    if($result = $mysqli->query($sql) ) {
      $i = 0;
      $arr[] = '';
      while($obj = $result->fetch_object()){
        $arr[] = array(
          'cnt'     => ++$i,
          'id'      => $obj->uid,
          'full'    => $obj->fullname,
          'name'    => $obj->username,
          'aktiv'   => getStatus($obj->aktiv, 0)
        );
      }
    }
    $result->close();
    return $arr;
  }
  
  
  /**
   * 
   * @param type $row
   * @return string
   */
  function getStatus($row, $aktiv) {
    if($row == 0) {
      $aktiv = 'Nein';
    }else if($row == 1) {
      $aktiv = 'Ja'; 
    }
    return $aktiv;
  }