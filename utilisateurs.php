<?php 
    include 'entete.php';
?>
<style>
    .connected-dot {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: green;
        border: white solid 1px;
    }

    .container-box {
        min-width: calc(100% / 4 - 15px);
        background: #fff;
        padding: 15px 14px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
        margin: 0px;
    }

    table {
        width: 100%;
        max-width: 960px;
        margin: 0 auto;

        border-collapse: separate;
        border-spacing: 0;
    }

    tbody tr:nth-child(odd) {
        background-color: #ECE9E9;
    }

    th,
    td {
        /* cell */
        padding: 0.75rem;
        font-size: 0.9375rem;
    }

    th {
        /* header cell */
        font-weight: 700;
        text-align: left;
        color: #272838;
        border-bottom: 2px solid #EB9486;

        position: sticky;
        top: 80px;
        background-color: #F9F8F8;
    }

    td {
        /* body cell */
        color: #7E7F9A;
    }
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="../../Front/css/sweetalert2.min.css">
<?php 
    include("../../config.php");
    include("../../Controllers/utilisateursController.php");
    $utilisateursController = new utilisateursController();
    $utilisateurs = $utilisateursController->afficherutilisateurs();
?>

<div class="home-content">


    <div class="row">


        <div class="col-sm-5">
            <div style="padding: 0 20px;">
                <div class="container-box">


                    <form id="registerForm" method="POST" action="useradd.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class=" mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom">
                                </div>
                            </div>


                            <div class="col">
                                <div class=" mb-3">
                                    <label for="prenom" class="form-label">Prenom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom">
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class=" mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class=" mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone">
                        </div>

                        <div class="form-group mb-3 ">
                            <label for="telephone" class="form-label">Image</label>
                            <div class="custom-file">
                                <input id="imageUser" name="imageUser" type="file" class="custom-file-input"
                                    required="">
                                <label class="custom-file-label" for="imageUser">Choisir un fichier</label>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <button onclick="controle_de_saisie()" type="button" style="height:100%;"
                                class="btn btn-success">Submit</button>
                        </div>
                    </form>






                </div>
            </div>
        </div>

        <div class="col-sm-7">
            <div style="padding: 0 20px;">
                <div class="container-box">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Nom et Prenom</th>
                                <th>Informations</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($utilisateurs as $utilisateur): ?>
                            <tr>
                                <td>
                                    <?php echo $utilisateur['id']; ?>
                                </td>
                                <td>
                                    <div style="position: relative;">
                                        <img style="width:50px;height:50px;object-fit:cover;border-radius:50%;"
                                            src="../../Front/uploads/utilisateurs/<?php echo $utilisateur['image']; ?>"
                                            alt="image">
                                            <?php if ($utilisateur['connected']==1): ?>    
                                                <div class="connected-dot"></div>
                                            <?php endif ?>
                                    </div>

                                </td>
                                <td>
                                    <?php echo $utilisateur['nom']." ".$utilisateur['prenom']; ?>
                                </td>
                                <td>
                                    <?php echo $utilisateur['email'];?>
                                    <p>
                                        <?php echo $utilisateur['telephone'];?>
                                    </p>
                                </td>
                                <td>
                                    <?php echo $utilisateur['role']; ?>
                                </td>

                                <td>
                                    <?php if ($utilisateur['id']!=$_SESSION['id']): ?>
                                    <?php if ($utilisateur['role']=='user'): ?>
                                    <a href="usergrant.php?id=<?php echo $utilisateur['id'];?>" class="btn btn-primary">
                                        Grant admin
                                    </a>
                                    <?php else: ?>
                                    <a href="userdeny.php?id=<?php echo $utilisateur['id'];?>" class="btn btn-primary">
                                        Remove Admin privileges
                                    </a>
                                    <?php endif ?>


                                    <a href="userdelete.php?id=<?php echo $utilisateur['id'];?>" class="btn btn-danger">
                                        Supprimer
                                    </a>
                                    <?php endif ?>

                                </td>
                            </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>







</div>



<script src="../../Front/js/sweetalert2.min.js"></script>
<script src="../../Front/js/jquery.min.js"></script>

<script>
    function controle_de_saisie() {

        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var telephone = document.getElementById('telephone').value;

        var image = $('#imageUser').prop('files')[0];

        if (!nom) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Nom est obligatoire !' })
            return;
        }

        if (!prenom) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Prenom est obligatoire !' })
            return;
        }

        if (!email) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Email est obligatoire !' })
            return;
        }

        if (!password) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Password est obligatoire !' })
            return;
        }

        if (!telephone) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Telephone est obligatoire !' })
            return;
        }

        if (typeof image === 'undefined') {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Image est obligatoire !' })
            return;
        }




        document.getElementById('registerForm').submit();
    }
</script>

<?php 
    include 'pied.php';
?>