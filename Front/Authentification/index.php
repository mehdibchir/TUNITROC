<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="stylesheet" href="bootstrap.min.css">
   <link rel="stylesheet" href="login.css">

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
        <div class="top_link"><a href="../Home/index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
        <div class="contact">
          <form id="loginForm" method="POST" action="login.php">
            <h3>SIGN IN</h3>
            <input id="email" name="email" type="text" placeholder="Email ou numero de telephone">
            <input id="password" name="password" type="text" placeholder="Password">
            <a href="forgetPassword.php">mot de passe oublié?</a>

            <button style="display:none;" class="submit">Login</button>
            <button onclick="controle_de_saisie()" type="button" class="submit">Login</button>
            
            <div style="display: flex;justify-content: center;">
              <a style="color: #1d4851;text-decoration: none;" href="register.php">S'inscrire</a>
            </div>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text">
          <h2>LONYX</h2>
          <h5>A UX BASED CREATIVE AGENCEY</h5>
        </div>
        <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
      </div>
    </div>
  </section>
     
  <script src="../js/sweetalert2.min.js"></script>

  <script>
    function controle_de_saisie() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

      if (!email) {
        Swal.fire({icon: 'error',title: 'Oops...',text: 'Email est obligatoire !'})
        return;
      }

      if (!password) {
        Swal.fire({icon: 'error',title: 'Oops...',text: 'Password est obligatoire !'})
        return;
      }


      document.getElementById('loginForm').submit();
    }
  </script>


    <?php if (isset($_GET['erreur']) && $_GET['erreur']==1) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Mauvais identifiant ou mot de passe !'
      })
    </script>
    <?php endif ?>

              
   </body>
</html>