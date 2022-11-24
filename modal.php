<div class="modal fade" id="modal-delete-<?= $event['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Supprimer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez vous supprimer l'event <strong><?= $event['title'] ?></strong> ?</p>
            </div>
            <div class="modal-footer">
                <a href="delete-event.php?id=<?= $event['id'] ?>" class="btn btn-danger">Oui</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>