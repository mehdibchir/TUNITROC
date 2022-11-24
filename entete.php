
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
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
          <a href="article.php">
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
          <a href="#">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
        <li>
          <a href="./list-events.php">
        <i>  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
             <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
        </svg></i>
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
          <a href="#">
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