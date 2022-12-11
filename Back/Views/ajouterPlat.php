<?php
include '../Controller/platC.php';
$platC=new PlatC();
require_once(__DIR__ . '/vendor/autoload.php');

if(
    isset($_POST['Nomplat']) && !empty($_POST['Nomplat'])
    && isset($_POST['descP']) && !empty($_POST['descP'])
    && isset($_POST['categorie']) && !empty($_POST['categorie'])
    && isset($_POST['img']) && !empty($_POST['img'])

){
    $plat = new plat($_POST['Nomplat'],$_POST['descP'],$_POST['categorie'],$_POST['img']);
    $platC->ajouterPlat($plat);
    sendEmail($email, $nom, $message, $plat);
}
else
{
echo 'Erreur test';
//header('Location: dashboard.php');
}
$email='mehdi.bchir@esprit.tn';
$nom='mehdi';
$message='Article a ete bien ajouter';
function sendEmail($email,$nom,$message,$plat){
   
    $credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
    $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);
    
    $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
         'subject' => $plat,
         'sender' => ['name' => 'tunitroc', 'email' => 'mehdi.bchir@esprit.tn'],
         'replyTo' => ['name' => 'mehdi', 'email' => 'mehdi.bchir@esprit.tn'],
         'to' => [[ 'name' => 'Mehdi', 'email' => 'mehdi.bchir@esprit.tn']],
         'htmlContent' => '<html> <head>  </head><body> <h1>Hi ! Un plat a ete ajouter ! <br>  Votre Sujet Etait : "{{params.bodyMessage}} "</h1>  </body></html>',
         'params' => ['bodyMessage' => $plat]
        
    
    ]);
    
    try {
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        print_r($result);
    } catch (Exception $e) {
        echo $e->getMessage(),PHP_EOL;
    }
    
    }
?>


