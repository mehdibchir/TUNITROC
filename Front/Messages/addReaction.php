<?PHP
	include "../../config.php";
	include "../../Models/message.php";
	include "../../Controllers/messageController.php";
	
	$messageController=new messageController();

	$messageController->addReaction($_POST['id'],$_POST['reaction']);

	echo json_encode(['code'=>200, 'message'=>"added"]);

?>