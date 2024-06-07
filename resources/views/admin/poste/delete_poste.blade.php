@foreach($postes as $poste)
<!-- DELETE POSITION MODAL -->
<div class="modal fade" id="deleteModal{{ $poste->id_poste }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Confirmer la suppression</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('poste.delete',$poste->id_poste) }}">
              @csrf
              @method('DELETE')
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>ÊTES-VOUS SÛR DE VOULOIR SUPPRIMER CETTE ELECTION ?</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endforeach


