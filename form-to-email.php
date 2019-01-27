<?php
  if(!isset($_POST['submit']))
  {
  //This page should not be accessed directly. Need to submit the form.
    echo "error; you need to submit the form!";
    exit;
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $requestSelection = $_POST['requestSelection'];

  //Validate first
  if(empty($name)||empty($email))
  {
      echo "Name and email are mandatory!";
      exit;
  }

  if(IsInjected($email))
  {
      echo "Bad email value!";
      exit;
  }

  $email_from = 'contact@colbyhemond.me';
  $email_subject = "Request - $name";
  $email_body = "Name: $name \n".
  		          "Email: $email \n".
  		          "Phone: $phone \n".
                "Request: $requestSelection";

  $to = "contact@colbyhemond.me";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email \r\n";
  mail($to,$email_subject,$email_body,$headers);

  header('Location: success.php');

  // Function to validate against any email injection attempts
  function IsInjected($str)
  {
    $injections = array('(\n+)',
                '(\r+)',
                '(\t+)',
                '(%0A+)',
                '(%0D+)',
                '(%08+)',
                '(%09+)'
                );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
      {
      return true;
    }
    else
      {
      return false;
    }
  }

?>
