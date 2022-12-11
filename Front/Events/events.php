<!DOCTYPE html>
<html lang="en">
   <head>
   <?php include("../_layouts/libs.php") ?>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="../images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
     

   <header class="full_bg">
      <?php include("../_layouts/header.php") ?>
   </header>   

      



















   <?php
include("../../config.php");
include("../../Controllers/EventC.php");
$eventC = new EventC();
    $dated = isset($_GET["dated"]) ? $_GET["dated"] : "";
    $datef = isset($_GET["datef"]) ? $_GET["datef"] : "";
    $words = isset($_GET["words"])? $_GET["words"] : "";
    
    
$events = $eventC->afficherEvents(1, $dated, $datef, $words);


    


$arr = array();
foreach ($events as $event) {
    
    array_push($arr, $event);
}

$nb_elements_per_page = 6;
$nb_pages = ceil(count($arr) / $nb_elements_per_page);
$page = $_GET["page"]  ? $_GET["page"] : 1;

$debut = ($page - 1) * $nb_elements_per_page;
$fin = $debut + $nb_elements_per_page;

$events = array_slice($arr, $debut, $fin);


?>


</div>
</div>
</div>
</div>
</div>
</div>
<!-- end header inner -->
<!-- end header -->
<!-- banner -->
</header>
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Evenements</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- projects -->
<div class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <div class="d-flex container-fluid" style="padding:3px 28px ; justify-content:space-between">
                        <h3>Filters</h3>
                        <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                            </svg> </button>
                    </div>
                    <form class="collapse" action="events.php?page=1&" id="collapseExample" method="GET">
                        <div class="row  d-flex" style="padding:3px 28px ; ">
                            <div style="display:none" class="form-group col-4 text-start" style="text-align: initial;">
                                <label for="Date" class="col-form-label">Recherche</label>
                                <input type="text" placeholder="Rechercher" value="1" class="form-control" id="words" name="page">

                            </div>
                            <div class="form-group col-4 " style="text-align: initial;">
                                <label for="Date" class="col-form-label">Date Debut</label>
                                <input type="datetime-local" class="form-control" id="date" name="dated">

                            </div>
                            <div class="form-group col-4 text-start" style="text-align: initial;">
                                <label for="Date" class="col-form-label">Date Fin</label>
                                <input type="datetime-local" class="form-control" id="date" name="datef">

                            </div>
                            <div class="form-group col-4 text-start" style="text-align: initial;">
                                <label for="Date" class="col-form-label">Recherche</label>
                                <input type="text" placeholder="Rechercher" class="form-control" id="words" name="words">

                            </div>

                        </div>

                        <div class="row" style="justify-content:start ; padding:3px 42px ; ">

                            <button type="submit" class="btn btn-outline-warning">Appliquer</button>

                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="proj" class="carousel slide projects_ban" data-ride="carousel">

                    <?php $i = 0;   ?>
                    <?php foreach ($events as $event) :  ?>
                        <?php if ($i % 3 == 0) : ?>
                            <div class="container-fluid">
                                <div class="carousel-caption relative3">
                                    <div class="row">
                                    <?php endif ?>
                                    <div class="col-md-4">

                                        <div class="project">
                                            <div class="project_img">
                                                <figure><img src="../../uploads/<?= $event["image"] ?>" alt="#" /></figure>
                                            </div>
                                            <div id="pro_ho" class="project_text" style="width: 98%;">
                                                <div class="row">
                                                    <div class="col-4 text-start">
                                                        <h3> <?= $event["title"] ?></h3>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <h3> <?= $event["date"] ?></h3>

                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <h3> <?= $event["nbp"] ?>/<?= $event["nb"] ?></h3>   
                                                      

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p style="text-overflow:'\n'"><?= $event["description"] ?></p>

                                                    </div>

                                                </div>
                                                <br><br>
                                                <div class="row" style="justify-content:start ;">

                                                    <?php
                                                    if ($event["joined"] == "0")
                                                    {                        
                                                            if($event["nbp"]==$event["nb"]) {
                                                                echo  '<a href="javascript:void(0)"  style="cursor : not-allowed" class="btn btn-primary">Join</a>';
                                                            }else
                                                            {
                                                                echo  '<a href="join.php?idevent='.$event["id"] .'&iduser=1 " class="btn btn-primary">Join</a>';
                                  
                                                            }                       
                                                        }                                           
                                                          else
                                                            echo  '<a href="unjoin.php?idevent='.$event["id"] .'&iduser=1 "class="btn btn-primary">unjoin</a>';

                                                    ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++; ?>
                                    <?php if ($i % 3 == 0) : ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif ?>


                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div id="pagination" class="d-flex " style="justify-content: center ;">
            <?php
            for ($i = 1; $i < $nb_pages + 1; $i++) {
                if ($page == $i)
                    echo "<a class='btn btn-warning  ml-2' href='?page=$i&dated=$dated&datef=$datef&words=$words'>" . ($i) . "</a>";
                else
                    echo "<a class='btn btn-outline-warning  ml-2' href='?page=$i&dated=$dated&datef=$datef&words=$words'>" . ($i) . "</a>";
            }
            ?>
        </div>
    </div>
















      <!--  footer -->
      <?php include("../_layouts/footer.php") ?>                          
      <!-- end footer -->
      <!-- Javascript files-->
      <?php include("../_layouts/scripts.php") ?>                     
   </body>
</html>