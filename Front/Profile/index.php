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
            <div class="lx-column column-user-pic">
               <div class="profile-pic">
                  <h1 class="pic-label">Profile picture</h1>
                  <div class="pic bs-md">
                     <img id="user_image" src="../uploads/utilisateurs/<?php echo $_SESSION['image']; ?>" alt=""
                        width="4024" height="6048" loading="lazy">
                     <button onclick="document.getElementById('imageUser').click()" id="change-avatar" class="lx-btn"><i
                           class="fa fa-camera-retro"></i>&nbsp;&nbsp;Change your profile picture.</button>
                  </div>

                  <form style="margin: 0;" method="post" action="updateImage.php" enctype="multipart/form-data">



                     <div style="display: none;" class="form-group">
                        <div class="custom-file">
                           <input onchange="preview_image(event)" id="imageUser" name="imageUser" type="file"
                              class="custom-file-input" required="">
                           <label class="custom-file-label" for="imageUser">Choisir un fichier</label>
                        </div>
                     </div>

                     <div id="update-image-container" style="margin-top: 10px;display: none;">
                        <button type="submit" class="btn btn-outline-success">Update image</button>
                     </div>
                  </form>

               </div>
            </div>
            <div class="lx-column">





               <form id="updateForm" method="post" action="updateProfile.php">
                  <input id="id" name="id" type="text" style="display: none;" value="<?php echo $_SESSION['id']; ?>">
                  <div class="row">
                     <div class="col">
                        <div class="fieldset">
                           <label for="nom">Nom</label>
                           <div class="input-wrapper">
                              <span class="icon"><i class="fa fa-user"></i></span>
                              <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom']; ?>" required>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="fieldset">
                           <label for="prenom">Prenom</label>
                           <div class="input-wrapper">
                              <span class="icon"><i class="fa fa-user"></i></span>
                              <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>"
                                 required>
                           </div>
                        </div>
                     </div>

                  </div>




                  <div style="margin-top:20px;" class="row">
                     <div class="col">
                        <div class="fieldset">
                           <label for="telephone">Telephone</label>
                           <div class="input-wrapper">
                              <span class="icon"><i class="fa fa-address-card"></i></span>
                              <input id="telephone" name="telephone" value="<?php echo $_SESSION['telephone']; ?>"
                                 required>
                           </div>
                        </div>
                     </div>


                     <div class="col">
                     <div class="fieldset">
                           <label for="sexe">Sexe</label>
                           <div class="input-wrapper">
                              <span class="icon"><i class="fa fa-address-card"></i></span>
                              <input id="sexe" name="sexe" value="<?php echo $_SESSION['sexe']; ?>" required>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="fieldset">
                     <label for="email">E-mail</label>
                     <div class="input-wrapper">
                        <span class="icon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" required>
                     </div>
                     <div id="email-helper" class="helper"></div>
                  </div>

                  <div class="fieldset">
                     <label for="pass">Password</label>
                     <div class="input-wrapper">
                        <span class="icon"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" id="password" value="" required>
                     </div>
                     <div id="pass-helper" class="helper">
                        <p>Enter your password to save changes.</p>
                     </div>

                  </div>
                  <div class="actions">
                     <button onclick="delete_account()" type="button" id="cancel" class="lx-btn"><i
                           class="fa fa-ban"></i>&nbsp;&nbsp;Delete account</button>
                     <button onclick="update_profile()" type="button" id="save" class="lx-btn"><i
                           class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                  </div>
               </form>
            </div>
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

      function delete_account() {
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = "deleteAccount.php"
               Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
               )
            }
         })
      }

      function update_profile() {
         var id = document.getElementById('id').value;
         var nom = document.getElementById('nom').value;
         var prenom = document.getElementById('prenom').value;
         var email = document.getElementById('email').value;
         var password = document.getElementById('password').value;
         var telephone = document.getElementById('telephone').value;



         if (!nom) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Nom est obligatoire !' })
            return;
         }

         if (!prenom) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Prenom est obligatoire !' })
            return;
         }

         if (!telephone) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Telephone est obligatoire !' })
            return;
         }

         if (telephone.length !== 8) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: "le numero de telephone n'est pas valide !" })
            return;
         }

         if (!email) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Email est obligatoire !' })
            return;
         }


         if (!password) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'le mot de passe est obligatoire !' })
            return;
         }


         document.getElementById('updateForm').submit();


      }

      function preview_image(event) {
         var reader = new FileReader();
         reader.onload = function () {
            var output = document.getElementById('user_image');
            output.src = reader.result;
            document.getElementById('update-image-container').style.display = 'flex';
            document.getElementById('update-image-container').style.justifyContent = 'center';

         }
         reader.readAsDataURL(event.target.files[0]);
      };
   </script>
</body>

</html>