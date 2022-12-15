<?php
    session_start();
    ob_start(); //
?>

<style>
    .avatar-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 5px;
    }

    .notification-button {
        background-color: #e4e6eb;
        width: 40px;
        height: 40px;
        margin: 0px 5px 0px 5px;
        border-radius: 50%;
        border: none;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notification-button:hover {
        background-color: #cccfd4;
        cursor: pointer;
    }

    .notification-button img {
        height: 20px;
        width: 20px;
    }

    .notification-group {
        position: relative;
        display: inline-block;
    }

    .messages-content {
        display: none;
        position: absolute;
        left: -150px;
        background-color: white;
        min-width: 160px;
        max-width: 400px;
        width: 350px;
        min-height: 100px;
        max-height: 80vh;
        overflow: auto;
        box-shadow: 0px -1px 10px 0px rgb(0 0 0 / 20%);
        z-index: 1;
        border-radius: 7px;
        padding: 9px
    }

    .notification-content {
        display: none;
        position: absolute;
        left: -150px;
        background-color: white;
        min-width: 160px;
        max-width: 400px;
        width: 350px;
        min-height: 100px;
        max-height: 80vh;
        overflow: auto;
        box-shadow: 0px -1px 10px 0px rgb(0 0 0 / 20%);
        z-index: 1;
        border-radius: 7px;
        padding: 9px
    }


    .show {
        display: block;
    }




    .fullscreen-btn {
        width: 32px;
        height: 32px;
        background-color: white;
        border: none;
        border-radius: 50%;
    }

    .fullscreen-btn:hover {
        background-color: #e4e6eb;
    }

    .fullscreen-btn img {
        width: 20px;
        height: 20px;
        position: relative;
        top: -2px;
    }
</style>
<div class="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="contat_infoma">
                        <li>

                            <?php if (isset($_SESSION['id'])) : ?>
                            <!-- is connected -->
                            <!-- <a href="../Profile/index.php"><i class="fa fa-user"></i> <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></a>  -->

                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img style="width:30px;height:30px;object-fit:cover;border-radius:50%;margin-right:2px;"
                                        src="../uploads/utilisateurs/<?php echo $_SESSION['image']; ?>" alt="image">
                                    <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a style="color:black;" class="dropdown-item" href="../Profile/"><i
                                            class="fa fa-user"></i> Modifier votre profil</a>
                                    <a style="color:black;" class="dropdown-item" href="../Profile/Password.php"><i
                                            class="fa fa-lock"></i> Modifier le mot de passe</a>
                                    <a style="color:black;" class="dropdown-item"
                                        href="../Authentification/logout.php"><i class="fa fa-arrow-right"></i>
                                        Logout</a>
                                </div>
                            </div>

                            <div class="notification-group">
                                <a href="../Messages/" class="notification-button">
                                    <img src="../images/messagesicon.png" alt="messagesicon">
                                </a>
                            </div>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <ul class="contat_infoma text_align_right">
                        <li>
                            <?php if (!isset($_SESSION['id'])) : ?>
                            <!-- is not connected -->
                            <a href="../Authentification/index.php">Login</a> / <a
                                href="../Authentification/register.php">register</a>
                            <?php endif ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="border-radius: 0px 0px 10px 10px;box-shadow: 9px -1rem 11rem 4px rgb(0 0 0 / 15%);" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header_bottom">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <!-- <div class="full">
                                    <div class="center-desk">
                                        <div class="logo">
                                            <a class="logo"><img src="../images/logo_bottom.png" alt="#" /></a>



                                        </div>
                                    </div>
                                </div> -->
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">

                                        <li class="nav-item">
                                            <a class="nav-link" href="../Home/">acceuil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../Events/events.php?page=1">Evenements    </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../project.php">Articles</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="staff.html">staff</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../ajouterlivraison.php">livraison</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="../consulterreclamation.php">Reclamation</a>
                                        </li>
                                    
                                        <li class="nav-item">
                                            <a class="nav-link" href="../contact.php">ajoutez un produit</a>
                                        </li>


                                    </ul>
                                </div>
                                <ul class="search">
                                    <li><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>