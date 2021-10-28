<?php
//this register.inc.php script handles errors and security measures in the form

  //this makes sure a user clicked on submit to get to this page
  if(isset($_POST['register-submit'])) {

    //path not required as its in the same folder
    require_once('../connect.php');

    //variables that store register.php info
    $username = mysqli_real_escape_string($connection,$_POST["userid"]);
    $password = mysqli_real_escape_string($connection,$_POST["pword"]);
    $firstname = mysqli_real_escape_string($connection,$_POST["fname"]);
    $lastname = mysqli_real_escape_string($connection,$_POST["lname"]);
    $email = mysqli_real_escape_string($connection,$_POST["mail"]);
    // $flag = mysqli_real_escape_string($connection,$_POST["user"]);
    $flag = "user";


    if(empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($flag)) {
      //header sends the user back to sign up upon errors my g
      //the ? means you intend to add extra data behind the url
      //incase the user bypasses the empty html required field this sends em back
      header("Location: ../register_form.php?error=emptyfields&userid=". $username. "&fname=" .$firstname. "&lname=" .$lastname. "&mail=" .$email. "&myflag=" .$flag);
      exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      header("Location: ../data/register_form.php?error=invalidmail&userid");
      exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../data/register_form.php?error=invalidmail&userid=". $username. "&fname=" .$firstname. "&lname=" .$lastname. "&mail=" .$email);
      exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      header("Location: ../data/register_form.php?error=invalid&userid=". $username. "&mail=" .$email);
      exit();
    }
    else {
      //check if user already exists within db
      //we use question marks and proceed to prepared statements
      $sql = "SELECT username FROM USERS WHERE username=?";
      $stmt = mysqli_stmt_init($connection);

      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../data/register_form.php?error=sqlerror");
        exit();
      }
      else {
        //binds the parameters from the user to the $stmt. The second is what datatype are u passing thru
        //s=string, b=boolean, i=integer, d=double. The number of ? you have defines the number strings you are passing i.e two ?? = two ss.
        mysqli_stmt_bind_param($stmt, "s", $username);

        //this executes the data from the user and the mysqli $stmt
        mysqli_stmt_execute($stmt);

        //takes the result we got from the db and stores it in $stmt
        mysqli_stmt_store_result($stmt);

        //checks the number of results we have in $stmt
        $resultCheck = mysqli_stmt_num_rows($stmt); 

        //check db if user is taken, if so go back to register.php
        if($resultCheck > 0) {
          header("Location: ../data/register_form.php?error=usertaken&mail=" .$email. "&fname=" .$firstname. "&lname=" .$lastname);
          exit();
        }
        else {
            //$username, $password, $firstname, $lastname, $email, $flag
            $sql = "INSERT INTO `USERS`(username, pass, email, flag, firstname, lastname) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($connection);

          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../data/register_form.php?error=sqlerror");
            exit();
          }
          else {

            $hashedpass = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashedpass, $email, $flag, $firstname,$lastname);
            mysqli_stmt_execute($stmt);

            header("Location: ../index.php?signup=success");
            exit();

          }
        }
      }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
  }

  else {
    header("Location: ../data/register_form.php");
    exit();
  }
?>