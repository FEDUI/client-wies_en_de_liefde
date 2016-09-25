<?php

  $url = $_GET['url'];
  if($content = @file_get_contents($url)) {
      echo $content;
  } else {
      echo 'fail';
  }
  exit;

?>
