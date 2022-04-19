<?php 
    function sanitize_input($data) {
        global $connection;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $connection->real_escape_string($data);
      }
      