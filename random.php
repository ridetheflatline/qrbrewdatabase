<?php
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$string = '';
 for ($i = 0; $i < 8; $i++) {
      $string .= $characters[rand(0, strlen($characters) - 1)];
 }
echo $string;
?>
