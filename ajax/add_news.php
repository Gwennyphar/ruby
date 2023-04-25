<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'addNews') == 0) {

    $title         = filter_var(filter_input(INPUT_POST, 'title'), FILTER_SANITIZE_STRING);
    $shorttext     = filter_var(filter_input(INPUT_POST, 'shorttext'), FILTER_SANITIZE_STRING);
    $description   = str_replace('€', '&euro;', filter_var(filter_input(INPUT_POST, 'description'), FILTER_SANITIZE_STRING));
    $imgVal        = filter_var(filter_input(INPUT_POST, 'imgVal'), FILTER_SANITIZE_STRING);

    //Datum in DB Format formatieren
    $start_date    = filter_var(filter_input(INPUT_POST, 'start'), FILTER_SANITIZE_STRING);
    $end_date      = filter_var(filter_input(INPUT_POST, 'end'), FILTER_SANITIZE_STRING);
    $start_date_us = date('Y-m-d', strtotime($start_date));
    $end_date_us   = date('Y-m-d', strtotime($end_date));




    /**
     * errorhandling
     */       
    if(empty($title) ) {
      $output = json_encode(array('type'=>'error', 'title' => ' Achtung: ', 'text' => 'Bitte eine Überschrift für die News vergeben.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
      die($output);
    } else {


      /**
       * insert attachements
       */
       $attmnt = "INSERT INTO news_attachments (link)"
        . "VALUES ('".$imgVal."')";
       if(isset($attmnt)) {
        $stmnt_attmnt = $mysqli->prepare($attmnt);
        $stmnt_attmnt->execute();
        $fkFile = mysqli_insert_id($mysqli);  
      }

      /**
       * insert newa
       */
       $news = "INSERT INTO news (title, shorttext, description, start, end, id_file)"
         . "VALUES ('".$title."', '".$shorttext."', '".$description."', '".$start_date_us."', '".$end_date_us."', $fkFile)";

       if(isset($news)) {
         $stmnt_news = $mysqli->prepare($news);
         $stmnt_news->execute();
         //auto-generated id
         $fkNews = mysqli_insert_id($mysqli);
       }

       if ($stmnt_news == true ) {
         $output = json_encode(array('type'=>'success', 'title' => ' Speichern erfolgreich: '.$imgVal, 'text' => 'News angelegt.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
         die($output);  
       }
       $mysqli->close(); 
    }
  } else {
    $output = json_encode(array('type'=>'error', 'title' => ' Speichern fehlgeschlagen: ', 'text' => 'News wurde nicht gespeichert.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
    die($output);
  }
    