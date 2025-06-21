<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your mail sending code here...
} else {
    http_response_code(405); // Optional
    echo "Method Not Allowed";
}

    /*‑‑ Who receives the message? ‑‑*/
    $to = "rimshanomani13@gmail.com";      // ← your address

    /*‑‑ Data coming from the form ‑‑*/
    $from      = $_POST['email']   ?? '';
    $name      = $_POST['name']    ?? '';
    $csubject  = $_POST['subject'] ?? '';
    $number    = $_POST['number']  ?? '';
    $cmessage  = $_POST['message'] ?? '';

    /*‑‑ Mail headers (HTML e‑mail) ‑‑*/
    $headers  = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    /*‑‑ What the mailbox will show as the subject line ‑‑*/
    $subject = "You have a message from your Bitmap Photography website";

    /*‑‑ Optional logo / link used inside the HTML body ‑‑*/
    $logo = 'img/logo.png';
    $link = '#';

    /*‑‑ Build the HTML body ‑‑*/
    $body = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Express Mail</title></head>
<body>
<table style="width:100%;">
  <thead style="text-align:center;">
    <tr>
      <td colspan="2" style="border:none;">
        <a href="$link"><img src="$logo" alt=""></a><br><br>
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="border:none;"><strong>Name:</strong> $name</td>
      <td style="border:none;"><strong>Email:</strong> $from</td>
    </tr>
    <tr>
      <td style="border:none;"><strong>Phone:</strong> $number</td>
      <td style="border:none;"><strong>Subject:</strong> $csubject</td>
    </tr>
    <tr>
      <td colspan="2" style="border:none;">$cmessage</td>
    </tr>
  </tbody>
</table>
</body>
</html>
HTML;

    /*‑‑ Send it ‑‑*/
    $sent = mail($to, $subject, $body, $headers);

    /*‑‑ Optional: simple result check ‑‑*/
    if ($sent) {
        echo "Mail sent successfully.";
    } else {
        echo "Mail sending failed.";
    }
?>
