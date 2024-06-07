<div class="modal fade" id="addnew">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Nouveau Electeur</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{route('electeur.store_electeur') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <div class="form-group">
                  <label for="prenom_electeur" class="col-sm-3 control-label">Prenom</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prenom_electeur" name="prenom_electeur" required>
                          @error('prenom_electeur')
                             <div class="text-danger">{{ $message }}</div>
                          @enderror
                  </div>
              </div>
              <div class="form-group">
                  <label for="nom_electeur" class="col-sm-3 control-label">Nom</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom_electeur" name="nom_electeur" required>
                          @error('nom_electeur')
                             <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
              </div>
              <div class="form-group">
                <label for="mail_electeur" class="col-sm-3 control-label">Adresse email</label>

                <div class="col-sm-9">
                  <input type="text" class="form-control" id="mail_electeur" name="mail_electeur" required>
                   @error('mail_electeur')
                        <div class="text-danger">{{ $message }}</div>
                   @enderror
                </div>
            </div>
              <div class="form-group">
                <label for="mot_de_passe_electeur" class="col-sm-3 control-label">Mot de passe</label>

                <div class="col-sm-9">
                  <input type="password" class="form-control" id="mot_de_passe_electeur" name="mot_de_passe_electeur" required>
                  @error('mot_de_passe_electeur')
                        <div class="text-danger">{{ $message }}</div>
                   @enderror
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
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Sauvegarder</button>
            </form>
          </div>
      </div>
  </div>
</div>

