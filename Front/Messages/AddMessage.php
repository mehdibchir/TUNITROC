<?PHP
	include "../../config.php";
	include "../../Models/message.php";
	include "../../Controllers/messageController.php";
	
	$messageController=new messageController();
	$message = new message(0,$_POST['sender'],$_POST['receiver'],$_POST['message'],$_POST['type'],null);

	$messageController->ajoutermessage($message);

	echo json_encode(['code'=>200, 'message'=>"added"]);

?>