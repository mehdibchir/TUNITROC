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
                <div class="top_link"><a href="../Home/index.php"><img
                            src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download"
                            alt="">Return home</a></div>
                <div class="contact">
                    <form onsubmit="event.preventDefault();" id="sendMailForm" method="POST" action="sendMail.php">
                        <h3>Mot de passe oublié ?</h3>
                        <input id="phone" name="phone" type="phone" placeholder="veuillez saisir votre numero de telephone">

                        <button style="margin-top: 20px;" onclick="controle_de_saisie()" type="button"
                            class="submit">Continuer</button>


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


<!-- Verify Code Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Code de verification envoyé </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
                <div class="form-group">
                  <p style="text-align:center;">Un code de vérification sera envoyé par email </p>
                  <label for="input-code" class="col-form-label">Code:</label>
                  <input type="text" class="form-control" id="input-code">
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="verifyCode()" type="button" class="btn btn-primary">verifier</button>
        </div>
      </div>
    </div>
  </div>


  <!-- change password Modal -->
<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="changeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeModalLabel">Changer votre mot de passe </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <div class="form-group">
                  <p style="text-align:center;">Vous pouvez changer votre mot de passe </p>
                  <label for="input-password" class="col-form-label">mot de passe:</label>
                  <input type="text" class="form-control" id="input-password">

                  <label for="input-confirm" class="col-form-label">confirmer votre mot de passe:</label>
                  <input type="text" class="form-control" id="input-confirm">
                </div>
                

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="changePassword()" type="button" class="btn btn-primary">verifier</button>
        </div>
      </div>
    </div>
  </div>

    <script src="../js/sweetalert2.min.js"></script>
    
    <script type='text/javascript' src="../js/jquery-3.6.0.min.js"></script>
    <script type='text/javascript' src="../js/bootstrap.js"></script>

    <script>
        var verificationCode = "";
        
        function verifyCode() {
            const inputCode = document.getElementById('input-code').value;
            if(!inputCode){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Code est obligatoire !' })
                return;
            }

            if(inputCode == verificationCode){
                $('#exampleModal').modal('toggle')
                $('#changeModal').modal('show')
            }else{
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'le code que vous avez saisi est incorrect !' })
            }
        }

        function changePassword() {
            var phone = document.getElementById('phone').value;

            const password = document.getElementById('input-password').value;
            const confirm = document.getElementById('input-confirm').value;

            if(!password){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Password est obligatoire !' })
                return;
            }

            if(!confirm){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Confirmer votre mot de passe !' })
                return;
            }

            if(password != confirm){
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'les mot de passe ne sont pas identiques !' })
                return;
            }

            $.ajax({
                url: "changePassword.php",
                data: {
                    'phone': phone,
                    'password': password,
                },
                type: 'POST',
                dataType: "json",
                success: function (data) {
                    if(data.code === 200){
                        $('#changeModal').modal('toggle')
                        Swal.fire('Good job!',data.message,'success').then((result) => { window.location.href = "index.php" })
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Ajax request failed. data");
                }
            })
            



        }

        function controle_de_saisie() {
            var phone = document.getElementById('phone').value;

            if (!phone) {
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Telephone est obligatoire !' })
                return;
            }


            $.ajax({
                url: "sendMail.php",
                data: {
                    'phone': phone,
                },
                type: 'POST',
                dataType: "json",
                success: function (data) {
                    if(data.code === 500){
                        Swal.fire({ icon: 'error', title: 'Oops...', text: data.message })
                    }else{
                        console.log(data.verificationCode)
                        verificationCode = data.verificationCode;

                        $('#exampleModal').modal('show')

                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Ajax request failed. data");
                    console.log(xhr,textStatus,errorThrown)
                }
            })

            //document.getElementById('sendMailForm').submit();
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