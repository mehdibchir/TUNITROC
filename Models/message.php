<?PHP
class message{

	private $id;
	private $sender;
	private $receiver;
	private $message;
	private $type;
	private $createdAt;
	

	function __construct($id,$sender,$receiver,$message,$type,$createdAt){
	$this->id=$id;
	$this->sender=$sender;
	$this->receiver=$receiver;
	$this->message=$message;
	$this->type=$type;
	$this->createdAt=$createdAt;
		}
	function getid(){
		return $this->id;
	}
	function getsender(){
		return $this->sender;
	}
	function getreceiver(){
		return $this->receiver;
	}
	function getmessage(){
		return $this->message;
	}
	function gettype(){
		return $this->type;
	}
	function getcreatedAt(){
		return $this->createdAt;
	}

	function setid($id){
		$this->id=$id;
	}
	function setsender($sender){
		$this->sender=$sender;
	}
	function setreceiver($receiver){
		$this->receiver=$receiver;
	}
	function setmessage($message){
		$this->message=$message;
	}
	function settype($type){
		$this->type=$type;
	}
	function setcreatedAt($createdAt){
		$this->createdAt=$createdAt;
	}
	
}

?>