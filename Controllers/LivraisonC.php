<?php
    require_once "../config.php";
    
    class livraisonC{
        public function afficherLivraison() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM livraison'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getLivraisonById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM livraison WHERE IdLivraison = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

     
        public function AjouterLivraison($liv) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO livraison (dateLivraison,telephone,adresse) VALUES (:dateLivraison, :telephone,:adresse)'
                );
                $query->execute([
                //'IdLivraison' => $liv->getId(),
              //  'NomLivraison'=>$liv->getNomLivraison(),
                 'dateLivraison' => $liv->getDateLivraison(),
                 'telephone' => $liv->getTelephone(),
                 'adresse' => $liv->getAdresse()
                ]);
                echo "zah";

                require "../../send/PHPMailerAutoload.php";
    require "../../send/credential.php";
                try {
                    $mail = new PHPMailer;
                    //Server settings
                   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();   
                                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';
                   // $mail->SMTPDebug = 2;                      // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;     
                                                 // Enable SMTP authentication
                    $mail->Username   = 'moataz.ben1@gmail.com';                     // SMTP username
                    $mail->Password   = '2419889966';                               // SMTP password
                    $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;   
                    //var_dump($mail);                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('moataz.ben1@gmail.com', 'Livraison');
                
                    $mail->addAddress('moataz.ben1@gmail.com');               // Name is optional
                
                
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Livraison';
                    $mail->Body = 'Livraison est ajoute avec succes';
                    if($mail->send())
                        echo 'Message has been sent';

                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function UpdateLivraison($liv, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE livraison SET dateLivraison=:dateLivraison,
                     telephone=:telephone,adresse = :adresse
                     WHERE IdLivraison = :id'
                );
                $query->execute([
                    'IdLivraison' => $liv->getIdLivraison(),
                   // 'NomLivraison'=>$liv->getNomLivraison(),
                    'dateLivraison' => $liv->getdateLivraison(),
                    'telephone' => $liv->getTelephone(),
                    'adresse' => $liv->getAdresse(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function Deletelivraison($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM livraison WHERE IdLivraison = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


        public function RechercherLivraison($recherche) {            
            $sql="SELECT * from livraison where IdLivraison like '%$recherche%' or dateLivraison like '%$recherche%' or telephone like '%$recherche%'or adresse like '%$recherche%'";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
       /* public function TriArticlesAd(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM articlejardinage ORDER BY NomArticle ");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriArticles(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM articlejardinage ORDER BY PrixArticle");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriArticlesdesc(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM articlejardinage ORDER BY PrixArticle DESC");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }*/
       
       
        
    }
    