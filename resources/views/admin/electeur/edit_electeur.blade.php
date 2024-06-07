@foreach($electeurs as $electeur)

<div class="modal fade" id="editModal{{ $electeur->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier Electeur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('electeur.update_electeur',$electeur->id) }}">
               @csrf
               @method('PUT')
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_prenom_electeur" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_prenom_electeur" name="prenom_electeur" value="{{$electeur->prenom_electeur}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_nom_electeur" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nom_electeur" name="nom_electeur" value="{{$electeur->nom_electeur}}" required>
                    </div>
                </div>

                <div class="form-group">
                  <label for="mail_electeur" class="col-sm-3 control-label">Adresse email</label>
  
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="mail_electeur" name="mail_electeur" value="{{$electeur->email}}"  required>
                     
                  </div>
              </div>
              
            

                <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                  <div class="col-sm-9">
                    <input type="file" id="photo" name="photo" value="{{$electeur->photo}}" >
                  </div>
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Mise à jour</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endforeach

