<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="register.css">

    <link rel="stylesheet" href="../css/sweetalert2.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">

    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="top_link"><a href="../Home/index.php"><img
                            src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download"
                            alt="">Return home</a></div>
                <div class="contact">
                    <form id="registerForm" method="POST" action="addUser.php" enctype="multipart/form-data">
                        <h3>SIGN UP</h3>
                        <div class="row">
                            <div class="col">
                                <input id="nom" name="nom" type="text" placeholder="Nom">
                            </div>
                            <div class="col">
                                <input id="prenom" name="prenom" type="text" placeholder="Prenom">
                            </div>
                        </div>


                        <input id="email" name="email" type="email" placeholder="Email">
                        <input id="password" name="password" type="password" placeholder="Password">

                        <div class="row">
                          <div class="col-sm-6">
                            <input id="telephone" name="telephone" type="text" placeholder="telephone">
                          </div>
                          <div class="col-sm-6">
                            <select style="margin: 15px 0px;" class="form-control" name="sexe" id="sexe">
                              <option value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                            </select>
                          </div>
                        </div>
                       
                        <div style="margin: 15px 0px;" class="form-group">
                            <div class="custom-file">
                                <input id="imageUser" name="imageUser" type="file" class="custom-file-input" required="">
                                <label class="custom-file-label" for="imageUser">Choisir un fichier</label>
                            </div>
                        </div>


                        <button style="display:none;" class="submit">Register</button>
                        <button onclick="controle_de_saisie()" type="button" class="submit">Register</button>
                        <div style="display: flex;justify-content: center;">
                          <a style="color: #1d4851;text-decoration: none;" href="index.php">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>LONYX</h2>
                    <h5>A UX BASED CREATIVE AGENCEY</h5>
                </div>
                <div class="right-inductor"><img
                        src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
                        alt=""></div>
            </div>
        </div>
    </section>


    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/jquery.min.js"></script>

<script>
  function controle_de_saisie() {

    var nom = document.getElementById('nom').value; 
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var telephone = document.getElementById('telephone').value;

    var image = $('#imageUser').prop('files')[0];

    if (!nom) {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Nom est obligatoire !'})
      return;
    }

    if (!prenom) {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Prenom est obligatoire !'})
      return;
    }

    if (!email) {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Email est obligatoire !'})
      return;
    }

    if (!password) {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Password est obligatoire !'})
      return;
    }

    if (!telephone) {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Telephone est obligatoire !'})
      return;
    }

    if (typeof image === 'undefined') {
      Swal.fire({icon: 'error',title: 'Oops...',text: 'Image est obligatoire !'})
      return;
    }




    document.getElementById('registerForm').submit();
  }
</script>

</body>

</html>