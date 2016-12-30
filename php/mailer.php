<?php

  // Only process POST reqeusts.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //your site secret key
    $secret = '**********';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if($responseData->success) {
      // Get the form fields and remove whitespace.
      $name = strip_tags(trim($_POST["name"]));
  		$name = str_replace(array("\r","\n"),array(" "," "),$name);
      $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
      $message = trim($_POST["msg"]);

      // Check that data was sent to the mailer.
      if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Inget fält får vara tomt!";
        exit;
      }

    }
    else {
      http_response_code(400);
      echo "Bekräfta att du inte är en robot.";
      exit;
    }

    // Set the recipient email address.
    // FIXME: Update this to your desired email address.
    $recipient = "*******";

    // Set the email subject.
    $subject = "[Veganbingo] $name har något på hjärtat";

    // Build the email content.
    $email_content = "Namn: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Meddelande:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
      // Set a 200 (okay) response code.
      http_response_code(200);
      echo "Tack för ditt meddelande!";
    } else {
      // Set a 500 (internal server error) response code.
      http_response_code(500);
      echo "Någonting gick snett och det är inte ditt fel.";
    }

  } else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "Någonting gick snett och det är inte ditt fel.";
  }

?>
