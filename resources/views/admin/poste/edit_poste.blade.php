@foreach($postes as $poste)
<div class="modal fade" id="editModal{{ $poste->id_poste }}" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Modifier Poste</b></h4>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" method="POST" action="{{ route('poste.update_poste',$poste->id_poste) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Type De Poste</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="type_poste" value="{{$poste->type_poste}}" required >
                             @error('type_poste')
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="max_vote" class="col-sm-3 control-label">Maximum Vote</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="max_vote" name="max_vote"  value="{{$poste->max_vote}}" required>
                            @error('max_vote')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_debut" class="col-sm-3 control-label">Date Debut</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" id="date_debut" name="date_debut" value="{{$poste->date_debut}}" required>
                            @error('date_debut')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_fin" class="col-sm-3 control-label">Date Fin</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" id="date_fin" name="date_fin" value="{{$poste->date_fin}}" required>
                            @error('date_fin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Fermer
                </button>
                <button type="submit" class="btn btn-primary btn-flat" name="add">
                    <i class="fa fa-save"></i> Sauvegarder
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
