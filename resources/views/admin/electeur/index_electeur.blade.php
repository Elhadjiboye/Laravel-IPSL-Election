@extends('layouts.template_admin')

@section('content')
<section class="content-header">
      <h1>

Gérer les electeurs
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border" style="display: flex; justify-content: space-between;">
              <div>
                  <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
              </div>
              <div style="margin-left: 10px;">
                  <form method="post" enctype="multipart/form-data" class="form-inline justify-content-end" onsubmit="return validateForm()" action="{{ route('electeur.excel.import') }}">
                      @csrf
                      @method('POST')
                      <div class="form-group mb-2">
                          <input type="file" name="excel_file" id="excelFile" class="form-control" accept=".xls, .xlsx, .csv">
                      </div>
                      <div class="form-group mx-sm-3 mb-2">
                          <button type="submit" id="importButton" name="import" class="btn btn-primary btn-sm btn-flat">Importer Excel</button>
                      </div>
                  </form>
              </div>
              <div>
                  <form method="post" action="send_emails.php" enctype="multipart/form-data">
                      <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-envelope"></i> Envoyer e-mails</button>
                  </form>
              </div>
          </div>
          
            <div class="box-body">

             
              <br>
              <table id="example1" class="table table-bordered">
                <thead>
                    <th class="hidden"></th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Profile</th>
                    <th class="text-center">Prénom</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Actions</th>
                </thead>

                <tbody>
                        @forelse($electeurs as $electeur )
                            <tr>
                              <td class='cell text-center'>{{ $electeur->id_electeur }}</td>
                              <td class='cell text-center'><img src="/images/{{ $electeur->photo }}"></td>
                              <td class='cell text-center'>{{ $electeur->prenom_electeur}}</td>
                              <td class='cell text-center'>{{ $electeur->nom_electeur }} </td>
                              <td class="text-center">
                                  <a href="#" data-toggle="modal" data-target="#editModal{{ $electeur->id }}" class="btn btn-success btn-sm btn-flat">
                                      <i class="fa fa-edit"></i> Modifier
                                  </a>
                                  <a href="#" data-toggle="modal" data-target="#deleteModal{{ $electeur->id }}" class="btn btn-danger btn-sm btn-flat">
                                      <i class="fa fa-trash"></i> Supprimer
                                  </a>
                              </td>
                            </tr>
                        @empty
                            <tr>
                                <td classe = "cell" colspan='6'> Aucun Electeur Ajoutés</td>
                            </tr>
                        @endforelse

               </tbody>
               @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
               @endif

               @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
               @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('admin.electeur.edit_electeur')
    @include('admin.electeur.delete_electeur')
    @include('admin.electeur.create_electeur')
   
@endsection
