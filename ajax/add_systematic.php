<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'save') == 0 ) {

  $class      = filter_var(filter_input(INPUT_POST, 'class'), FILTER_SANITIZE_STRING);
  $department = filter_var(filter_input(INPUT_POST, 'department'), FILTER_SANITIZE_STRING);


  /**
   * errorhandling
   */       
  if(empty($class) || empty($department) ) {
    $output = json_encode(array('type'=>'error', 'title' => ' Achtung: ', 'text' => 'Bitte eine Klasse vergeben.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
    die($output);
  } else {
   
           
  /**
   * insert user logins
   */
   $sql = "INSERT INTO systematics (class, department)"
     . "VALUES ('".$class."', '".$department."')";

   if(isset($sql)) {
     $stmnt_local = $mysqli->prepare($sql);
     $stmnt_local->execute();
   }

   if ($stmnt_local == true ) {
    $output = json_encode(array('type'=>'success', 'title' => ' Speichern erfolgreich: ', 'text' => $department.' gespeichert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
    die($output);
   }
  }
} else {
$output = json_encode(array('type'=>'error', 'title' => ' Speichern fehlgeschlagen: ', 'text' => $department.' wurde nicht gespeichert.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
die($output);
}
    