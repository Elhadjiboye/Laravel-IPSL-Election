@foreach($candidats as $candidat)
<div class="modal fade" id="platform{{ $candidat->id_candidat }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Programme de {{ $candidat->prenom_candidat}} {{ $candidat->nom_candidat}}</b></h4>
            </div>
            <div class="modal-body">
             <p>{{ $candidat->programme_detude }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
