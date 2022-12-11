<?PHP
	include "../../config.php";
	include "../../Models/utilisateurs.php";
	include "../../Controllers/utilisateursController.php";

    if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['telephone']) and isset($_POST['sexe']))
    {

	$target_dir = "../uploads/utilisateurs/";
	$pattern=rand(100000,1000000);
	$target_file = $target_dir.$pattern."_".basename($_FILES["imageUser"]["name"]);
	// var_dump($target_file);

		$hashed = password_hash($_POST['password'],PASSWORD_DEFAULT);



        $utilisateurs=new utilisateurs(0,$_POST['nom'],$_POST['prenom'],$_POST['email'],$hashed,$_POST['telephone'],$_POST['sexe'],"user",$pattern."_".$_FILES["imageUser"]["name"]);

		$utilisateursController=new utilisateursController();
        move_uploaded_file($_FILES["imageUser"]["tmp_name"], $target_file);
		$utilisateursController->ajouterutilisateurs($utilisateurs);




        header('Location: index.php');
		
		//ob_end_clean();
	
}else{
	echo "vérifier les champs";
}
//*/

?>