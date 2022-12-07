<?php
	include "../../config.php";
	include "../../Models/utilisateurs.php";
	include "../../Controllers/utilisateursController.php";

    require_once '../vendor/autoload.php';

    use Twilio\Rest\Client;

    if (isset($_POST['phone'])) {
        	$utilisateursController=new utilisateursController();
            $user = $utilisateursController->findUserByPhone($_POST['phone']);
            if($user == false){
                echo json_encode(['code'=>500, 'message'=>"compte n'exite pas"]);
            }else{
                $pattern=rand(100000,1000000);



                $sid = "ACf3f6a581837c4c572c6393c75e3875ff";
                $token = "ae7577dbac2527613e2e2c61a2db6bd0";

                $twilio = new Client($sid, $token);
                $message = $twilio->messages
                        ->create("+216".$_POST['phone'], // to
                            [
                                "body" => "Veuillez copier le code ci-dessous pour vérifier votre compte : ".$pattern,
                                "from" => "+17743443210"
                            ]
                        );

                echo json_encode(['code'=>200, 'message'=>"Message sent successfully...",'verificationCode'=> $pattern]);

            }
            
            
    }


?>