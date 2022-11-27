<?PHP
class utilisateurs{

	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $password;
	private $telephone;
	private $role;
	private $image;
	

	function __construct($id,$nom,$prenom,$email,$password,$telephone,$role,$image){
	$this->id=$id;
	$this->nom=$nom;
	$this->prenom=$prenom;
	$this->email=$email;
	$this->password=$password;
	$this->telephone=$telephone;
	$this->role=$role;
	$this->image=$image;
		}
	function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
	function getpassword(){
		return $this->password;
	}
	function gettelephone(){
		return $this->telephone;
	}
	function getrole(){
		return $this->role;
	}
	function getimage(){
		return $this->image;
	}

	function setid($id){
		$this->id=$id;
	}
	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setpassword($password){
		$this->password=$password;
	}
	function settelephone($telephone){
		$this->telephone=$telephone;
	}
	function setrole($role){
		$this->role=$role;
	}
	function setimage($image){
		$this->image=$image;
	}
	
}

?>