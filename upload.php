<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $section = $_POST['section'];
    $rollno = $_POST['rollno'];
    $address = $_POST['address'];

    $uploaded_files = [];
    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = basename($_FILES['files']['name'][$key]);
        $target_path = "uploads/" . time() . "_" . $file_name;
        if (move_uploaded_file($tmp_name, $target_path)) {
            $uploaded_files[] = $target_path;
        }
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = SMTP_PORT;

        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->addAddress(ADMIN_EMAIL);

        $mail->isHTML(true);
        $mail->Subject = "New Printing Request from $name";
        $mail->Body    = "<b>Name:</b> $name<br>
                          <b>Section:</b> $section<br>
                          <b>Roll No.:</b> $rollno<br>
                          <b>Address:</b> $address<br>";

        foreach ($uploaded_files as $file) {
            $mail->addAttachment($file);
        }

        $mail->send();

        echo "<h3>Thank you $name! Your files have been submitted.</h3>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
