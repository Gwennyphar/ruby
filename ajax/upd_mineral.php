<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'update') == 0 ) {

  $id = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  
  if($result = $mysqli->query($sql) ) {
    $mineral   = filter_var(filter_input(INPUT_POST, 'mineral'), FILTER_SANITIZE_STRING);
    $formula   = filter_var(filter_input(INPUT_POST, 'formula'), FILTER_SANITIZE_STRING);

    $update = "UPDATE minerals "
        . "SET name = '$mineral', formula = '$formula' "
        . "WHERE id_mineral = ".$id;
   
    //change Layouttext
    if(isset($update)) {
      $stmnt = $mysqli->prepare( utf8_decode($update) );
      $stmnt->execute();
      if($stmnt == true) {
        $output = json_encode(array('type'=>'success', 'title' => ' Änderung erfolgreich: ', 'mineral' => $mineral, 'formula' => $formula, 'text' => $mineral.' wurde aktualisiert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
        die($output);
      } else {
        $output = json_encode(array('type'=>'error', 'title' => ' Änderung fehlgeschlagen: ', 'text' => 'Aktualisierung war nicht erfolgreich.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
        die($output);
      }
      $mysqli->close(); 
      }
    } else {
      $output = json_encode(array('type'=>'error', 'title' => ' Fehler: ', 'text' => 'Aktualisierung nicht möglich.', 'alert' => 'info', 'icon'=>'fa fa-bug'));  
      die($output);
    }
}