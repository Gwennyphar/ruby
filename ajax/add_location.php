<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'save') == 0 ) {

  $location  = filter_var(filter_input(INPUT_POST, 'location'), FILTER_SANITIZE_STRING);
  $country   = filter_var(filter_input(INPUT_POST, 'country'), FILTER_SANITIZE_STRING);


  /**
   * errorhandling
   */       
  if(empty($location) || empty($country) ) {
    $output = json_encode(array('type'=>'error', 'title' => ' Achtung: ', 'text' => 'Bitte Fundstelle und Land eintragen.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
    die($output);
  } else {
   
           
  /**
   * insert user logins
   */
   $sql = "INSERT INTO locations (location, country)"
     . "VALUES ('".$location."', '".$country."')";

   if(isset($sql)) {
     $stmnt_local = $mysqli->prepare($sql);
     $stmnt_local->execute();
   }

   if ($stmnt_local == true ) {
    $output = json_encode(array('type'=>'success', 'title' => ' Speichern erfolgreich: ', 'text' => $location.' gespeichert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
    die($output);
   }
  }
} else {
$output = json_encode(array('type'=>'error', 'title' => ' Speichern fehlgeschlagen: ', 'text' => $location.' wurde nicht gespeichert.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
die($output);
}
    