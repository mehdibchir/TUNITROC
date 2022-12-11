<?PHP

include "../../config.php";


if (isset($_POST['email']) and isset($_POST['password']))
{ 
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM utilisateurs WHERE email = :email OR telephone = :email');
        $email = $_POST['email'];
        $req->execute(array('email' => $email));
        $response = $req->fetch();

        $password = $_POST['password'];
        $hash = $response['password'];
        if (password_verify($password, $hash))
        {
            echo 'pass correct';
            $isPasswordCorrect = true;
        }
        else {
            echo'pass incorrect';
            $isPasswordCorrect = false;
        }

        if (!$response)
        {
            echo 'Mauvais identifiant ou mot de passe !';
            header('Location: index.php?erreur=1');
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();

                echo'session start';


                $_SESSION["id"] = $response['id'];
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $response['password'];
                $_SESSION["nom"] = $response['nom'];
                $_SESSION["prenom"] = $response['prenom'];
                $_SESSION["role"] = $response['role'];
                $_SESSION["image"] = $response['image'];
                $_SESSION["telephone"] = $response['telephone'];
                $_SESSION["sexe"] = $response['sexe'];

                $_COOKIE['id'] = $response['id'];

                $req = $db->prepare('UPDATE utilisateurs SET connected=:connected WHERE id=:id');
                $req->execute(array('connected' => 1,'id'=>$response['id']));
                $res = $req->fetch();

                if ($response['role']=='admin') {
                    header("Location: ../../Back/vue/dashboard.php");
                }else{
                    header("Location: ../Home/index.php?user=".$_SESSION['prenom']);
                }
                

                //ob_end_clean();




            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
                header('Location: index.php?erreur=1');
            }

        }

}else{
    echo 'Mauvais identifiant ou mot de passe !';
    header('Location: index.php?erreur=1');
}
?>
