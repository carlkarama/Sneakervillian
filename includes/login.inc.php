<?php

  if(isset($_POST['signinbtn'])) {
    require_once('../connect.php');

    $username = mysqli_real_escape_string($connection,$_POST["uname"]);
    $password = mysqli_real_escape_string($connection,$_POST["pass"]);

    if(empty($username) || empty($password)) {
      header("Location: ../login_form.php?error=emptyfields");
      exit();
    }
    
    else {
      //the ? protect us from malicious input into the system
      $sql = "SELECT * FROM USERS WHERE username=?";
      $stmt = mysqli_stmt_init($connection);

      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login_form.php?error=sqlerror");
        exit();
      }
            else {
              //passes the value from the $stmt into the db
              mysqli_stmt_bind_param($stmt, "s", $username);
              mysqli_stmt_execute($stmt);

              $result = mysqli_stmt_get_result($stmt);

                      //this if runs and checks the result form the db
                      if($row = mysqli_fetch_assoc($result)) {

                              //this variable stores the hash entered by the user
                              $lithashchecker = password_verify($password, $row['pass']);


                              if ($lithashchecker == $row['pass']) {

                                if ($row['flag'] == 'admin') {
                                  // code...
                                session_start();
                                $_SESSION['uid'] = $row['userID'];
                                $_SESSION['usern'] = $row['username'];
                                $_SESSION['rwot'] = $row['flag'];

                                header("Location: ../admin/index_admin.php?login=admin");
                                exit();
                                }

                                else if ($row['flag'] == 'user') {

                                  session_start();
                                  $_SESSION['uid'] = $row['userID'];
                                  $_SESSION['usern'] = $row['username'];
                                  $_SESSION['danu'] = $row['flag'];
                                  header("Location: ../data/index_user.php?login=user");
                                  exit();
                                }
                              }

                        else if($password !== $row['password']) {
                          header("Location: ../index.php?error=wrongpassword");
                          exit();
                        }
                      }
              else {
                header("Location: ../index.php?error=nouser");
                exit();
              }
            }
          }
  }
  else {
    header("Location: ../index.php");
    exit();
  }
?>
