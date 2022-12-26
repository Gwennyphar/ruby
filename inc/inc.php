<?php

  /**
   * 
   * @param type $string
   * @param type $lenght
   * @return type
   */
  function shortText($string,$lenght) {
    if(strlen($string) > $lenght) {
      $string = substr($string,0,$lenght)."...";
      $string_ende = strrchr($string, " ");
      $string = str_replace($string_ende," ...", $string);
      
    }
    return $string;
  }

  
  /**
   * 
   * @param type $subDir
   * @return type
   */
  function getUrlBase($subDir) {
    return filter_input(INPUT_SERVER, 'SERVER_NAME').$subDir;   
  }

  
 /**
  * convert date german format
  * @param type $date
  * @return type
  */
  function convertDatetime($date) {
    $newDate = date('d.m.Y', strtotime($date));
    return $newDate;
  }