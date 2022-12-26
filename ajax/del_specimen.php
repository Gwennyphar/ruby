<?php 
  include_once '../inc/check.php';
  $id      = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $mineral = filter_var(filter_input(INPUT_POST, 'mineral'), FILTER_SANITIZE_STRING);

  /**
   * delete specimen
   */
   $del_spec = "DELETE s.*, a.* "
       . "FROM specimen s "
       . "LEFT JOIN attachments a ON s.id_file = a.id_file "
       . "WHERE s.id_specim = $id";
   
   if(isset($del_spec)) {
     $stmnt_del = $mysqli->prepare($del_spec);
     $stmnt_del->execute();
   }
   if ($stmnt_del == true ) {
     $output = json_encode(array('type'=>'success', 'title' => ' Löschen erfolgreich: ', 'text' => $mineral.' gelöscht.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
     die($output); 
   } else {
     $output = json_encode(array('type'=>'error', 'title' => ' Löschen fehlgeschlagen: ', 'text' => $mineral.' nicht gelöscht.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
     die($output);
   }