<?php
session_start();
include_once'../model/function.php';
?>

<?php
  if (!isset($_SESSION['id'])){
    header("Location: ../../Front/Authentification/index.php");
    ob_end_clean();
  }
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">TUNITROC</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../consulterreclamation.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Reclamation</span>
          </a>
        </li>
        <li>
        <a href="../consulterreponse.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Reponse</span>
          </a>
        </li>
        <li>
          <a href="../views/article.php">
            <i class="bx bx-box"></i>
            <span class="links_name">ARTICLE</span>
          </a>
        </li>
        <li>
          <a href="ajoutcategorie.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">categorie</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analyses</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Tout les commmandes</span>
          </a>
        </li>
        <li>
          <a href="utilisateurs.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateurs</span>
          </a>
        </li>
        <li>
          <a href="list-events.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Evenements</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../../Front/Authentification/logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">TUNISIE</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>