<?php

include '../controller/EventC.php';
$eventc=new EventC();
$events=$eventc->afficherEvent();
?>
<?php include("../includes/header.php") ?>

<div class="">
<?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
<div class="alert alert-success" role="alert">
    <strong>Supprimer avec succes </strong>
</div>
<?php endif ?>
<?php if (isset($_GET['status']) && $_GET['status'] == "added") : ?>
<div class="alert alert-success" role="alert">
    <strong>Ajout  avec succes</strong>
</div>
<?php endif ?>
<?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
<div class="alert alert-success" role="alert">
    <strong>Modifier avec succes</strong>
</div>
<?php endif ?>
<div class="card border-primary ">
    <div class="card-header bg-primary text-white">
    <strong><i class="fa fa-database"></i> Evenements</strong>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-12"  style="display:flex ; justify-content:space-between">
            <h5 class="card-title float-left">Table Evenements</h5>
            <a href="add-event.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Ajouter un evenement</a>
        </div>
    </div>
    <div class="table-responsive">

    <table id="dataTable" class="dataTable  table table-bordered table-striped text-center">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>titre</th>
                <th>Image</th>
                <th>Description</th>
                <th>Date</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($events as $event) : ?>
            <tr>
                <td><?= $event['id'] ?></td>
                <td><?= $event['title'] ?></td>
                <td><img src="../../uploads/<?= $event['image'] ;?> "width="100px" height="100px"></td>
                <td><?= $event['description'] ?></td>
                <td><?= $event['date'] ?></td>

                <td class="text-center">
                    <a href="edit-event.php?id=<?=$event['id']?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                    <button id="trigger"style="width: 35px;" type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $event['id'] ?>">
                    <i class="fa fa-trash"></i>
                    </button>

                    <?php include("../includes/modal.php")?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<br>
</div>
</div>

</div>     
 
</div>
</section>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable(
        {
        

            "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Aucun enregistrement trouvé",
                "info": "Affichage de la page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré à partir de _MAX_ enregistrements au total)",
                "search": "Rechercher:",
                "paginate": {
                    "first":      "Premier",
                    "last":       "Dernier",
                    "next":       "Suivant",
                    "previous":   "Précédent"
                }
            }
        }
    );
} );
$('#trigger').click(function () {
	$('#basicExample').modal({show : true});
});
    </script>


