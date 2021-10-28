<?php
  //till next time

  session_start();
  session_unset();
  session_destroy();

  header("Location: ../index.php?loggedout=success");
