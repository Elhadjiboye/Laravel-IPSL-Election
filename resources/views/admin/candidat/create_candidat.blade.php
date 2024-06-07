<div class="modal fade" id="addnew">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Nouveau Candidat</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{route('candidat.store_candidat') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <div class="form-group">
                  <label for="prenom_candidat" class="col-sm-3 control-label">Prenom</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prenom_candidat" name="prenom_candidat" required>
                          @error('prenom_candidat')
                             <div class="text-danger">{{ $message }}</div>
                          @enderror
                  </div>
              </div>
              <div class="form-group">
                  <label for="nom_candidat" class="col-sm-3 control-label">Nom</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom_candidat" name="nom_candidat" required>
                          @error('nom_candidat')
                             <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
              </div>
              <div class="form-group">
                  <label for="mail_candidat" class="col-sm-3 control-label">Adresse email</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="mail_candidat" name="mail_candidat" required>
                     @error('nom_candidat')
                          <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
              </div>
              <div class="form-group">
                  <label for="poste" class="col-sm-3 control-label">Poste</label>
                  <div class="col-sm-9">
                      <select class="form-control" id="poste" name="poste">
                          <option value="" selected>- Sélectionner -</option>
                          
                          @foreach($postes as $poste)
                          <option value="{{ $poste->id_poste }}">{{ $poste->type_poste }}</option>
                          @endforeach

                          
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                  <div class="col-sm-9">
                    <input type="file" id="photo" name="photo">
                    @error('photo')
                          <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
              </div>
              <div class="form-group">
                  <label for="platform" class="col-sm-3 control-label">Programme</label>

                  <div class="col-sm-9">
                    <textarea class="form-control" id="platform" name="platform" rows="7"></textarea>
                    @error('platform')
                          <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Sauvegarder</button>
            </form>
          </div>
      </div>
  </div>
</div>

