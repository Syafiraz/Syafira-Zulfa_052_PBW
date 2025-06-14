<?php
   $conn = new mysqli('localhost', 'root', '', 'pemrograman_web');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
?>
