<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("../_layouts/libs.php") ?>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/luxonauta/luxa@8a98/dist/compressed/luxa.css">
   <link rel="stylesheet" href="profile.css">
   <link rel="stylesheet" href="../css/sweetalert2.min.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">

   <!-- end loader -->
   <!-- header -->
   <header>
      <?php include("../_layouts/header.php") ?>
   </header>
   <!-- end banner -->


   <section style="margin: 50px 0px 30px 0px;">
      <div class="lx-container-50">

         <div style="padding: 30px;" class="lx-row align-stretch bs-md">





               <form id="passwordForm" method="post" action="changePassword.php">






                  <div class="fieldset">
                     <label for="telephone">Ancien mot de passe</label>
                     <div class="input-wrapper">
                        <span class="icon"><i class="fa fa-key"></i></span>
                        <input type="password" id="oldPassword" name="oldPassword" required>
                     </div>
                  </div>


                  <div class="fieldset">
                     <label for="email">Nouveau mot de passe</label>
                     <div class="input-wrapper">
                        <span class="icon"><i class="fa fa-key"></i></span>
                        <input type="password" name="newPassword" id="newPassword" required>
                     </div>
                  </div>

                  <div class="fieldset">
                     <label for="pass">Confirmer votre mot de passe</label>
                     <div class="input-wrapper">
                        <span class="icon"><i class="fa fa-key"></i></span>
                        <input type="password" name="confirmPassword" id="confirmPassword" required>
                     </div>

                  </div>
                  <div class="actions">
                     
                     <button onclick="changePassword()" type="button" id="save" class="lx-btn"><i
                           class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                  </div>
               </form>
         </div>
      </div>
   </section>

   <!--  footer -->
   <?php include("../_layouts/footer.php") ?>
   <!-- end footer -->



   <!-- Javascript files-->
   <?php include("../_layouts/scripts.php") ?>

   <script src="../js/sweetalert2.min.js"></script>

   <?php if (isset($_GET['erreur']) && $_GET['erreur']==1) : ?>
   <script>
      Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: 'Mot de passe incorrect !'
      })
   </script>
   <?php endif ?>


   <script>
        function changePassword() {
            var oldPassword = document.getElementById('oldPassword').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if(!oldPassword){
                Swal.fire({ icon: 'error', title: 'Oops...', text: "l'ancien mot de passe est obligatoire !" })
                return;
            }

            if(!newPassword){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'le mot de passe est obligatoire !' })
                return;
            }

            if(!confirmPassword){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'confirmer votre mot de passe !' })
                return;
            }

            if(newPassword!==confirmPassword){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'les mots de passe ne sont pas identiques !' })
                return;
            }

            document.getElementById('passwordForm').submit();



        }
   </script>


</body>

</html>