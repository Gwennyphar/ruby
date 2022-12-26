<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(db_switch() == 0) {
  $mysqli = new mysqli('localhost', 'root', '', ''); 
}
else if(db_switch() == 1) {
  $mysqli = new mysqli('127.0.0.1', 'root', 'root', 'ruby_db');
}
else if(db_switch() == 2) {
  $mysqli = new mysqli('127.0.0.1', 'root', 'root', 'ruby_db');
}

if ($mysqli->connect_errno) {
  die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
} else {
//  echo 'Verindung aufgebaut';
}

function db_switch() {
  $server = 1;
  return $server;
}
