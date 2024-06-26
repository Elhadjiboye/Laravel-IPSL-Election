<!-- CONFIG / SETTINGS FOR THE TITLE OF VOTING SYSTEM IN ADMIN DASHBOARD -->
<div class="modal fade" id="config">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Configuration du Titre de l'Election</b></h4>
            </div>
            <div class="modal-body">
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif
              <div class="text-center">
                  <form class="form-horizontal" method="POST" action="{{ route('titre_vote.save_titre') }}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Titre</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
              <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-save"></i> Sauvegarder</button>
              </form>
            </div>
        </div>
    </div>
</div>