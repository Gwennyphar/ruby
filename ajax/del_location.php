<?php 
  include_once '../inc/check.php';
  $id = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $location = filter_var(filter_input(INPUT_POST, 'location'), FILTER_SANITIZE_STRING);
  $country = filter_var(filter_input(INPUT_POST, 'country'), FILTER_SANITIZE_STRING);
  
  /**
   * delete location
   */
   $del_location = "DELETE l.*
     FROM locations l
     WHERE id_location = $id";

   if(isset($del_location)) {
     $stmnt_del = $mysqli->prepare($del_location);
     $stmnt_del->execute();
   }
   if ($stmnt_del == true ) {
     $output = json_encode(array('type'=>'success', 'title' => ' Löschen erfolgreich: ', 'text' => $location.' '.$country.' wurde gelöscht.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
     die($output); 
   } else {
     $output = json_encode(array('type'=>'error', 'title' => ' Löschen fehlgeschlagen: ', 'text' => $location.' '.$country.'  wurde nicht gelöscht.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
     die($output);
   }