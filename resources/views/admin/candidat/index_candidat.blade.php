@extends('layouts.template_admin')

@section('content')
<section class="content-header">
      <h1>

Gérer les candidats
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                      <th class="text-center">Poste</th>
                      <th class="text-center">Profil</th>
                      <th class="text-center">Prénom</th>
                      <th class="text-center">Nom</th>
                      <th class="text-center">Programme</th>
                      <th class="text-center">Actions</th>
                  </tr>
                </thead>

                <tbody>
                        @forelse($candidats as $candidat )
                            <tr>
                              <td class='cell text-center'>{{ optional($candidat->poste)->type_poste }}</td>
                              <td class='cell text-center'><img src="/images/{{ $candidat->photo }}"></td>

                               <td class='cell text-center'>{{ $candidat->prenom_candidat }}</td>
                               <td class='cell text-center'>{{ $candidat->nom_candidat }} </td>
                               <td class='cell text-center'>
                                   
                                   <a href='#' data-toggle='modal' data-target="#platform{{ $candidat->id_candidat }}" class='btn btn-info btn-sm btn-flat' >
                                        <i class='fa fa-search'></i> Afficher
                                   </a>

                               </td>

                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#editModal{{ $candidat->id_candidat }}" class="btn btn-success btn-sm btn-flat">
                                            <i class="fa fa-edit"></i> Modifier
                                        </a>


                                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $candidat->id_candidat }}" class="btn btn-danger btn-sm btn-flat">
                                            <i class="fa fa-trash"></i> Supprimer
                                        </a>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td classe = "cell text-center" colspan='6'> Aucun Candidat Ajoutés</td>
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
        @include('admin.candidat.create_candidat')
        @include('admin.candidat.edit_candidat')
        @include('admin.candidat.delete_candidat')
        @include('admin.candidat.programme_candidat')
@endsection
