<!-- ADMIN PROFILE MODAL -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Profil de l'administrateur</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=home.php" enctype="multipart/form-data">
              <div class="form-group">
                  	<label for="nom" class="col-sm-3 control-label">Prenom</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="prenom" name="prenom" value="{{auth()->user()->prenom_electeur}}">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="nom" class="col-sm-3 control-label">Nom</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="nom" name="nom" value="{{auth()->user()->nom_electeur}}">
                  	</div>
                </div>

                <div class="form-group">
                    <label for="mot de passe" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="mot de passe" name="mot de passe">
                    </div>
                </div>

                <div class="form-group">
                  	<label for="mail" class="col-sm-3 control-label">Adresse email</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="mail" name="mail" value="{{auth()->user()->email}}">
                  	</div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo de profil : </label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Mot de passe actuel :</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Saisissez le mot de passe actuel pour enregistrer les modifications." required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Sauvegarder</button>
            	</form>
          	</div>
        </div>
    </div>