@foreach($candidats as $candidat)
<div class="modal fade" id="deleteModal{{ $candidat->id_candidat }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Confirmer la suppression</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('candidat.delete',$candidat->id_candidat) }}">
              @csrf
              @method('DELETE')
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>ÊTES-VOUS SÛR DE VOULOIR SUPPRIMER CE CANDIDAT ?</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endforeach

