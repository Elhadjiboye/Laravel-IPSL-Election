<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Gérer les Elections 
          </h1>
        </section>
        <section class="content">
                    <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                  <thead>
                            <th class="hidden"></th>
                                <th class="text-center">Type Election</th>
                                <th class="text-center">Maximum Vote</th>
                                <th class="text-center">Date Debut</th>
                                <th class="text-center">Date Fin</th>
                                <th class="text-center">Actions</th>

                    </thead>
                    <tbody>
                         @forelse($postes as $poste)
                            <tr>
                              <td class='hidden'></td>
                              <td>Présidentielle</td>
                              <td>1</td>
                              <td>
                                <button class='btn btn-success btn-sm Modifier btn-flat' data-id='5'><i class='fa fa-edit'></i> Modifier</button>
                                <button class='btn btn-danger btn-sm Supprimer btn-flat' data-id='5'><i class='fa fa-trash'></i>Supprimer</button>
                              </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell" colspan='5'> Aucune Poste Ajoutées</td>
                            </tr>
                            @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>   
      </div>