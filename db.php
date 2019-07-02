<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  'fcsmic',
  'phpApp'
) or die(mysqli_erro($mysqli));

?>
