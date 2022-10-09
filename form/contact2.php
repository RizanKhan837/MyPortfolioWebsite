<?php
$okMessage = 'Your message successfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';
try {

    if(count($_POST) == 0) throw new \Exception('Form is empty');
    if(isset($_POST['InputEmail']) && $_POST['InputEmail'] != '')
    {
        if ( filter_var($_POST['InputEmail'], FILTER_VALIDATE_EMAIL) ){

            $Email = $_POST['InputEmail'];
            $Name = $_POST['InputName'];
            $Message = $_POST['InputMessage'];
            $Subject = $_POST['InputSubject'];
            
            $MailTo = "rizankhan837@gmail.com";
            $Body = "";
            $Body .= "Email: ".$Email. "\r\n";
            $Body .= "From: ".$Name. "\r\n";
            $Body .= "From: ".$Message. "\r\n";
            mail($MailTo, $Subject, $Body);
            $MessageSent = true;
            $responseArray = array('type' => 'success', 'message' => $okMessage);
            echo $responseArray['message'];
        }
    }
} 
catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    echo $responseArray['message'];
}

?>