<?php
class General {

    // Function to format phone number into the proper format
    public function format_phone($phone)
    {
        $phone = preg_replace("/[^0-9]/", "", $phone);

        if(strlen($phone) == 7){

            return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);

        } elseif(strlen($phone) == 10) {

            return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);

        } else {

            return $phone;
        }
    }

    // Function for the custom contact form
    public function contact($name, $email, $phone, $permit_number, $subject, $message, $main_issue, $specific_issue){

        $mail = new PHPMailer();
        $mail->IsSMTP(); //Tell PHPMailer to use SMTP
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug  = 0;
        $mail->Debugoutput = 'html'; //Ask for HTML-friendly debug output
        $mail->Host       = 'smtp.gmail.com'; //Set the hostname of the mail server
        $mail->Port       = 587; //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->SMTPSecure = 'tls'; //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPAuth   = true; //Whether to use SMTP authentication
        $mail->Username   = ''; //Username to use for SMTP authentication - use full email address for gmail
        $mail->Password   = ''; //Password to use for SMTP authentication
        $mail->SetFrom('', $subject); //Set who the message is to be sent from
        $mail->AddReplyTo($email, $name); //Set an alternative reply-to address
        $mail->AddAddress(''); //Set who the message is to be sent to
        $mail->Subject = $subject;
        $mail->Body = "
        <b>Customer's Name:</b> $name<br>
        <b>Phone:</b> $phone<br>
        <b>Permit Number:</b> $permit_number<br>
        <b>Main Issue:</b> $main_issue<br>
        <b>Specific Issue: </b> $specific_issue<br><br>
        <b>Customer's Detailed Message: </b> $message<br>"; //HTML Body
        $mail->IsHTML(true); //Make sure it uses HTML
        $mail->Send(); //Send the email
    }

    // Function to get the full site url depending on https or http.
    public function site_url(){
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
        $domain_name = $_SERVER['HTTP_HOST'];
        return $protocol.$domain_name;
    }

    function make_safe($value) {
        $value = htmlentities($value, ENT_QUOTES, 'UTF-8');

        return $value;
    }

    function echo_back($value, $errors) {
        if(isset($value) && (empty($errors) === false)){
            $clean_up = $this->make_safe($value);
            return $clean_up;
        }
    }
}
