<?php
$email = "mehdi.bchir@esprit.tn";
$name = "Tunitroc";
$body = "aaaaaaaaaaaaaaa <br><br><a href='https://www.youtube.com/watch?v=NyMwS8HDTqM'>voir le nouveau article</a>";
$headers = array(
    'Authorization: Bearer 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',
    'Content-Type: application/json'
   );
   $subject = "test email";
$data = array(
"personalizations"=>array(
    array(
        "to"=>array(
            array(
                "email" =>$email,
                "name" =>$name
            )
            )
    )


            ),
            "from" =>array(
                "email" => "mehdibchir02@gmail.com"
            ),
            "subject"=>$subject,
            "content" => array(
                array(
"type" =>"text/html",
"value"=>$body
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
?>