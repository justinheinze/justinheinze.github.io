<?php

    // Here we get all the information from the fields sent over by the form.
    $name = $_REQUEST['user-name'];
    $email = $_REQUEST['user-email'];
    $message = ( $_REQUEST['user-message'] ) ? $_REQUEST['user-message'] : '';
    $status = $_REQUEST['user-status'];

    $to = 'info@justinheinze.co';
    $message = 'Name: '.$name.'<br /> Email: '.$email.'<br />Message: '.$message;

    $subject = 'Website Inquiry';

    $headers = "From: Info - Justin Heinze <".$to.">". "\r\n" .
                  "Return-Path: Info (info@justinheinze.co) <info@justinheinze.co>\r\n".
                  "Reply-To: Info (info@justinheinze.co)<".$to.">" . "\r\n" .
                  "MIME-Version: 1.0\r\n".
                  "Content-type: text/html; charset=iso-8859-1\r\n".
                  "X-Priority: 3\r\n" .
                  'X-Mailer: PHP/' . phpversion();

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $status == "yes" ) { // this line checks that we have a valid email address
        mail($to, $subject, $message, $headers); // this method sends the mail.
        echo "success"; // success message
        exit;
    }else{
        echo "error"; //error
    }

?>
