<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'save') == 0 ) {

  $name     = filter_var(filter_input(INPUT_POST, 'name'), FILTER_SANITIZE_STRING);
  $formula  = filter_var(filter_input(INPUT_POST, 'formula'), FILTER_SANITIZE_STRING);


  /**
   * errorhandling
   */       
  if(empty($name) ) {
    $output = json_encode(array('type'=>'error', 'title' => ' Achtung: ', 'text' => 'Bitte einen Mineraliennamen eintragen.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
    die($output);
  } else {
   
           
  /**
   * insert user logins
   */
   $sql = "INSERT INTO minerals (name, formula)"
     . "VALUES ('".utf8_decode($name)."', '".utf8_encode($formula)."')";

   if(isset($sql)) {
     $stmnt_local = $mysqli->prepare($sql);
     $stmnt_local->execute();
   }

   if ($stmnt_local == true ) {
    $output = json_encode(array('type'=>'success', 'title' => ' Speichern erfolgreich: ', 'text' => $name.' gespeichert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
    die($output);
   }
  }
} else {
$output = json_encode(array('type'=>'error', 'title' => ' Speichern fehlgeschlagen: ', 'text' => $name.' wurde nicht gespeichert.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
die($output);
}
    