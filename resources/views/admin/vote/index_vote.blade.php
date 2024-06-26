@extends('layouts.template_admin')

@section('content')
<section class="content-header">
      <h1>
      Gérer les votes
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#reset" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i> Réinitialiser</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th class='cell text-center'>Election</th>
                        <th class='cell text-center'>Nom Candidat</th>
                        <th class='cell text-center'>Nom Electeur</th>
                        <th class='cell text-center'>Date Vote</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ( $votes as $vote )
                            <tr>
                                <td class='cell text-center'>{{ optional($vote->poste)->type_poste }}</td>
                                <td class='cell text-center'>{{ optional($vote->candidat)->prenom_candidat}} {{ optional($vote->candidat)->nom_candidat}}</td>
                                <td class='cell text-center'>{{ optional($vote->User)->prenom_electeur}} {{ optional($vote->electeur)->nom_electeur}}</td>
                                <td class='cell text-center'>{{ \Carbon\Carbon::parse($vote->heure_vote)->format('Y-m-d H:i') }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="cell text-center" colspan='4' > Aucun Vote</td>
                                </tr>
                            @endforelse
                      
                </tbody>
              </table>
              @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 5000); // Ferme l'alerte après 5 secondes (5000 ms)
                </script>
              @endif

            </div>
          </div>
        </div>
      </div>
    </section>  
    @include('admin.vote.reset_vote') 
@endsection
