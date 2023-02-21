<?php
    $data = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $from = 'no-reply@example.com';
            $to = $_POST['email'];

            $subject = 'You had subscribed!';

            $text = 'You have been subscribed to our newsletter. Your 15% discount code is "SALE15".' . PHP_EOL . 'Enter the code in the Discount code field at checkout';

            $header = "MIME-Version: 1.0" . PHP_EOL;

            $header .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;

            $header .= 'To: <' . $to . '>' . PHP_EOL;
            $header .= 'Subject: =?UTF-8?B?' . base64_encode($subject) . '?=' . PHP_EOL;
            $header .= 'Date: ' . date('D, d M Y H:i:s O') . PHP_EOL;
            $header .= 'Cc: ' . $from . PHP_EOL;
            $header .= 'Bcc: ' . $from . PHP_EOL;
            $header .= 'Reply-To: =?UTF-8?B?' . base64_encode($from) . '?= <' . $from . '>' . PHP_EOL;

            $header .= 'Return-Path: ' . $from . PHP_EOL;
            $header .= 'X-Mailer: PHP/' . phpversion() . PHP_EOL;

            $boundary = '----=_NextPart_' . md5(time());

            $header .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . PHP_EOL . PHP_EOL;

            $message = '--' . $boundary . PHP_EOL;
            $message .= 'Content-Type: text/plain; charset="utf-8"' . PHP_EOL;
            $message .= 'Content-Transfer-Encoding: 8bit' . PHP_EOL . PHP_EOL;
            $message .= $text . PHP_EOL;

            mail($to, $subject, $message, $header);

            $data['success'] = 'Success: you had subscribed!';
        } else {
            $data['error'] = "Email address " . $_POST['email'] . " is considered invalid.";
        }
    }

    echo json_encode($data);

    exit();