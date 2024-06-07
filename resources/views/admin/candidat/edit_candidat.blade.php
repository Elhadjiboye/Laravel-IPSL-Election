@foreach($candidats as $candidat)

<div class="modal fade" id="editModal{{ $candidat->id_candidat }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier Electeur</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="{{ route('candidat.update_candidat',$candidat->id_candidat) }}">
               @csrf
               @method('PUT')
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_prenom_candidat" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_prenom_candidat" name="prenom_candidat" value="{{$candidat->prenom_candidat}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_nom_candidat" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nom_candidat" name="nom_candidat" value="{{$candidat->nom_candidat}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_election" class="col-sm-3 control-label">Poste</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="poste" name="poste">
                          <option value="" selected>- Sélectionner -</option>
                          @foreach($postes as $poste)
                              <option value="{{ $poste->id_poste }}" {{ $candidat->id_poste == $poste->id_poste ? 'selected' : '' }}>
                                  {{ $poste->type_poste }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  
                </div>

                <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                  <div class="col-sm-9">
                    <input type="file" id="photo" name="photo" value="{{$candidat->photo}}" >
                  </div>
              </div>
              
                <div class="form-group">
                    <label for="edit_platform" class="col-sm-3 control-label">Programme</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_platform" name="platform" rows="7" > {{$candidat->programme_detude}}</textarea>
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

