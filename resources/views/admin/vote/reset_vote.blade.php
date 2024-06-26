@foreach($votes as $vote)
<div class="modal fade" id="reset{{ $vote->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Réinitialiser les votes</b></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p>ÊTES-VOUS SÛR DE VOULOIR RÉINITIALISER CES VOTES ?</p>
                    <h4>Cela supprimera tous les votes et les comptages seront remis à zéro.</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <form action="{{ route('vote.reset_vote') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Réinitialiser</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
