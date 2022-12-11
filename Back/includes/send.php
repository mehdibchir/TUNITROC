<?php
require '../vendor/autoload.php';


function sendSms($number,$message)
{
    try {
        $sid="AC7427c5f21ce24dc244c6c843a6abadee";
        $token="0d905659e6f06e0f00fce85f21097ab6";
        $twilio_number="+12055393153";
        $client = new Twilio\Rest\Client($sid, $token);
        $number="+216".$number ;
        $client->messages->create(
            $number,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );

    } catch (\Throwable $th) {
        echo "Ops erruer !! ";
    }
}
function sendEmail($email,$body,$subject)
{
    
    

    $headers = array(
        'Authorization: Bearer YOUR-TOKEN', // your-token t3mel compte fil sendgrid taw y3tik token houttha lena
        'Content-Type: application/json'
    );

    $data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => $email
                    )
                )
            )
        ),
        "from" => array(
            "email" => "lina.saadi@esprit.tn"
        ),
        "subject" => $subject,
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $body
            )
        )
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
?>